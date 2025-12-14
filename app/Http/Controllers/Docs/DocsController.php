<?php

namespace App\Http\Controllers\Docs;

use App\Docs\Alias;
use App\Docs\Docs;
use App\Docs\DocumentationPage;
use App\Http\Controllers\Controller;
use App\Support\CommonMark\ImageRenderer;
use App\Support\CommonMark\LinkRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\MarkdownConverter;
use RuntimeException;
use Torchlight\Commonmark\V2\TorchlightExtension;

class DocsController extends Controller
{
    public function index(Docs $docs): View
    {
        return view('frontpage.docs.index', [
            'repositories' => $docs->getRepositories(),
        ]);
    }

    public function repository(Docs $docs, string $repository, ?string $alias = null)
    {
        try {
            $repository = $docs->getRepository($repository);
        } catch (RuntimeException $e) {
            abort(404, 'Repository not found');
        }

        abort_if(is_null($repository), 404, 'Repository not found');

        if ($alias) {
            preg_match('/v\d+/', $alias, $matches);

            if (! count($matches)) {
                $latest = $repository->aliases->keys()->first();
                $slug = $alias;
                $alias = $latest;

                return redirect()->action([DocsController::class, 'show'], [$repository->slug, $alias, $slug]);
            }

            $alias = $repository->getAlias($alias);

            abort_if(is_null($alias), 404, 'Alias not found');
        } else {
            $alias = $repository->aliases->first();
        }

        // Get first valid page (excluding README, toc, _index)
        $firstPage = $alias->pages
            ->where('section', '_root')
            ->filter(function ($page) {
                return !in_array(strtolower(basename($page->slug)), ['readme', 'toc', '_index']);
            })
            ->first();

        if (!$firstPage) {
            abort(404, 'No documentation pages found');
        }

        return redirect()->action([DocsController::class, 'show'], [
            $repository->slug,
            $alias->slug,
            $firstPage->slug,
        ]);
    }

    public function show(string $repository, string $alias, string $slug, Docs $docs)
    {
        try {
            $repository = $docs->getRepository($repository);
        } catch (RuntimeException $e) {
            abort(404, 'Repository not found');
        }

        preg_match('/v\d+/', $alias, $matches);

        if (! count($matches)) {
            $latest = $repository->aliases->keys()->first();
            $slug = "{$alias}/{$slug}";
            $alias = $latest;

            return redirect()->action([DocsController::class, 'show'], [$repository->slug, $alias, $slug]);
        }

        abort_if(is_null($repository), 404, 'Repository not found');

        $alias = $repository->getAlias($alias);

        if (! $alias) {
            $alias = $repository->aliases->keys()->first();

            return redirect()->action([DocsController::class, 'show'], [$repository->slug, $alias, $slug]);
        }

        /** @var Collection $pages */
        $pages = $alias->pages->filter(function ($page) {
            // Filter out toc.md, README.md and other non-documentation files
            return !in_array(strtolower(basename($page->slug)), ['toc', '_index', 'readme']);
        });

        $page = $pages->firstWhere('slug', $slug);

        if (! $page) {
            return redirect()->action([DocsController::class, 'repository'], [$repository->slug, $alias->slug]);
        }

        // Lazy render markdown at request time
        $page->contents = $this->renderMarkdown($page->contents);
        $page->contents = str_replace('<pre ', '<pre translate="no"', $page->contents);

        // Fix image paths to point to correct public directory
        $page->contents = $this->fixImagePaths($page->contents, $repository->slug, $alias->slug);

        $repositories = $docs->getRepositories();

        $navigation = $this->getNavigation($pages);

        $prevPage = $this->getPrevPage($page, $navigation);
        $nextPage = $this->getNextPage($page, $navigation);

        $showBigTitle = $page->slug === $navigation['_root']['pages'][0]->slug;

        $tableOfContents = $this->extractTableOfContents($page->contents);

        // Extract title from H1 for compatibility with old views
        $title = null;
        if (preg_match('/<h1[^>]*>([^<]+)<\/h1>/', $page->contents, $titleMatches)) {
            $title = $titleMatches[1];
        }

        // Generate TOC HTML for sidebar backward compatibility
        $toc = $this->generateTocHtml($navigation, $page, $repository, $alias);

        return view('frontpage.docs.show', [
            'page' => $page,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'repositories' => $repositories,
            'repository' => $repository,
            'pages' => $pages,
            'navigation' => $navigation,
            'alias' => $alias,
            'showBigTitle' => $showBigTitle,
            'tableOfContents' => $tableOfContents,
            'title' => $title,
            'content' => $page->contents, // For backward compatibility with old views
            'doc' => $repository->slug,
            'currentVersion' => $alias->slug,
            'versions' => $repository->aliases->pluck('slug'),
            'toc' => $toc, // For sidebar backward compatibility
            'currentDoc' => [ // For navbar/version selector backward compatibility
                'id' => $repository->slug,
                'name' => $repository->fullName ?? ucfirst($repository->slug),
                'demo' => $repository->demo ?? null,
                'support' => $repository->support ?? null,
            ],
        ]);
    }

    private function getNavigation(Collection $pages): Collection
    {
        $navigation = $pages
            ->reduce(function (array $navigation, DocumentationPage $page) {
                if ($page->isIndex()) {
                    $navigation[$page->section]['_index'] = $page;
                } else {
                    $navigation[$page->section]['pages'][] = $page;
                }

                return $navigation;
            }, []);

        return collect($navigation)->sortBy(fn (array $pages) => $pages['_index']->weight ?? -1);
    }

    private function extractTableOfContents(string $contents)
    {
        $matches = [];

        preg_match_all('/<h2.*><a.*id="([^"]+)".*>#<\/a>([^<]+)/', $contents, $matches);

        $tableOfContents = [];
        for ($i = 0; $i < count($matches[1]); $i++) {
            $tableOfContents[] = [
                'id' => $matches[1][$i],
                'text' => trim($matches[2][$i]),
            ];
        }

        return $tableOfContents;
    }

    private function renderMarkdown(string $contents): string
    {
        // Merge config from both markdown config files
        $config = [
            'heading_permalink' => config('markdown.heading_permalink', [
                'html_class' => 'anchor-link',
                'symbol' => '#',
                'id_prefix' => '',
                'fragment_prefix' => '',
                'insert' => 'before',
                'min_heading_level' => 2,
                'max_heading_level' => 6,
            ]),
            'html_input' => config('markdown.html_input', 'strip'),
            'allow_unsafe_links' => config('markdown.allow_unsafe_links', true),
            'commonmark' => config('markdown.commonmark', []),
            'renderer' => config('markdown.renderer', []),
            'table' => config('markdown.table', []),
            'max_nesting_level' => config('markdown.max_nesting_level', PHP_INT_MAX),
            'slug_normalizer' => config('markdown.slug_normalizer', []),
        ];

        $environment = new Environment($config);

        // Add extensions from config
        $extensions = config('markdown.extensions', []);
        foreach ($extensions as $extension) {
            if (class_exists($extension)) {
                $environment->addExtension(new $extension());
            }
        }

        // Add custom inline renderers for images and links
        $environment->addRenderer(Image::class, new ImageRenderer());
        $environment->addRenderer(Link::class, new LinkRenderer());

        // Create converter and render
        $converter = new MarkdownConverter($environment);

        return $converter->convert($contents)->getContent();
    }

    private function getPrevPage(DocumentationPage $currentPage, Collection $navigation): ?DocumentationPage
    {
        $prevPage = null;
        $currentFound = false;

        $previousSection = null;

        foreach ($navigation as $key => $section) {
            foreach ($section['pages'] as $index => $page) {
                if ($currentPage->slug === $page->slug) {
                    $prevPage = $section['pages'][$index - 1] ?? null;
                    $currentFound = true;
                }
            }

            if (! $prevPage && $currentFound && $previousSection) {
                return Arr::last($previousSection['pages']);
            }

            $previousSection = $section;
        }

        return $prevPage;
    }

    private function getNextPage(DocumentationPage $currentPage, Collection $navigation): ?DocumentationPage
    {
        $nextPage = null;
        $currentFound = false;

        foreach ($navigation as $key => $section) {
            if (! $nextPage && $currentFound) {
                return $section['pages'][0];
            }

            foreach ($section['pages'] as $index => $page) {
                if ($currentPage->slug === $page->slug) {
                    $nextPage = $section['pages'][$index + 1] ?? null;
                    $currentFound = true;
                }
            }
        }

        return $nextPage;
    }

    private function generateTocHtml(Collection $navigation, DocumentationPage $currentPage, $repository, Alias $alias): string
    {
        $html = '';

        foreach ($navigation as $section => $data) {
            if ($section === '_root') {
                // Root pages (without section)
                $html .= '<ul class="space-y-0.5 mb-4">';
                foreach ($data['pages'] as $page) {
                    $isActive = $page->slug === $currentPage->slug;
                    $activeClass = $isActive
                        ? 'text-indigo-600 dark:text-indigo-400 font-semibold bg-indigo-50 dark:bg-indigo-900/20'
                        : 'text-gray-900 dark:text-gray-100 font-medium hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-gray-50 dark:hover:bg-slate-800';

                    $url = route('docs.show', [$repository->slug, $alias->slug, $page->slug]);
                    $pageTitle = $page->title ?? $this->formatSlugToTitle($page->slug);

                    $html .= sprintf(
                        '<li><a href="%s" class="%s text-base block px-3 py-2 rounded-md">%s</a></li>',
                        $url,
                        $activeClass,
                        e($pageTitle)
                    );
                }
                $html .= '</ul>';
            } else {
                // Section with title and pages (collapsible)
                $sectionTitle = $data['_index']->title ?? ucfirst($section);
                $sectionId = 'section-' . str_replace(' ', '-', strtolower($sectionTitle));

                $html .= '<div class="mb-4">';
                $html .= '<button type="button" class="flex items-center w-full text-left px-3 py-2 text-base font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-slate-800 rounded-md" onclick="toggleSection(\'' . $sectionId . '\')">';
                $html .= '<svg class="w-4 h-4 mr-2 transition-transform section-arrow" id="' . $sectionId . '-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
                $html .= e($sectionTitle);
                $html .= '</button>';
                $html .= '<ul class="mt-1 space-y-0.5 ml-5" id="' . $sectionId . '">';

                foreach ($data['pages'] as $page) {
                    $isActive = $page->slug === $currentPage->slug;
                    $activeClass = $isActive
                        ? 'text-indigo-600 dark:text-indigo-400 font-semibold bg-indigo-50 dark:bg-indigo-900/20'
                        : 'text-gray-900 dark:text-gray-100 font-medium hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-gray-50 dark:hover:bg-slate-800';

                    $url = route('docs.show', [$repository->slug, $alias->slug, $page->slug]);
                    $pageTitle = $page->title ?? $this->formatSlugToTitle($page->slug);

                    $html .= sprintf(
                        '<li><a href="%s" class="%s text-base block px-3 py-2 rounded-md">%s</a></li>',
                        $url,
                        $activeClass,
                        e($pageTitle)
                    );
                }

                $html .= '</ul></div>';
            }
        }

        // Add script for collapsible sections
        $html .= '<script>
            function toggleSection(id) {
                const section = document.getElementById(id);
                const arrow = document.getElementById(id + "-arrow");
                if (section.classList.contains("hidden")) {
                    section.classList.remove("hidden");
                    arrow.style.transform = "rotate(0deg)";
                } else {
                    section.classList.add("hidden");
                    arrow.style.transform = "rotate(-90deg)";
                }
            }
        </script>';

        return $html;
    }

    private function formatSlugToTitle(string $slug): string
    {
        // Remove section prefix if exists (e.g., "guide/jquery" -> "jquery")
        $parts = explode('/', $slug);
        $lastPart = end($parts);

        // Convert slug to title (e.g., "getting-started" -> "Getting Started")
        return ucwords(str_replace(['-', '_'], ' ', $lastPart));
    }

    private function fixImagePaths(string $contents, string $repository, string $alias): string
    {
        // Fix absolute image paths like /images/cover.png to /docs/{repository}/{alias}/images/cover.png
        $contents = preg_replace(
            '/src="\/images\/([^"]+)"/i',
            'src="/docs/' . $repository . '/' . $alias . '/images/$1"',
            $contents
        );

        // Also handle paths like ./images/cover.png
        $contents = preg_replace(
            '/src="\.\/images\/([^"]+)"/i',
            'src="/docs/' . $repository . '/' . $alias . '/images/$1"',
            $contents
        );

        // Handle relative paths like images/cover.png (without leading ./ or /)
        $contents = preg_replace(
            '/src="images\/([^"]+)"/i',
            'src="/docs/' . $repository . '/' . $alias . '/images/$1"',
            $contents
        );

        return $contents;
    }
}
