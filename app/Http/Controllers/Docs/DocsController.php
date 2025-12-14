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
            // Check if alias is a valid version (v1, v2, latest, etc.)
            $validAlias = $repository->getAlias($alias);

            if (! $validAlias) {
                // Alias is not a version, treat it as a page slug
                $latest = $repository->aliases->keys()->first();
                $slug = $alias;
                $alias = $latest;

                return redirect()->action([DocsController::class, 'show'], [$repository->slug, $alias, $slug]);
            }

            $alias = $validAlias;
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

        // Check if alias is a valid version (v1, v2, latest, etc.)
        $validAlias = $repository->getAlias($alias);

        if (! $validAlias) {
            // Alias is not a version, treat it as part of the slug
            $latest = $repository->aliases->keys()->first();
            $slug = "{$alias}/{$slug}";
            $alias = $latest;

            return redirect()->action([DocsController::class, 'show'], [$repository->slug, $alias, $slug]);
        }

        abort_if(is_null($repository), 404, 'Repository not found');

        $alias = $validAlias;

        /** @var Collection $pages */
        $pages = $alias->pages->filter(function ($page) {
            // Filter out toc.md, README.md and other non-documentation files
            // Note: _index files are kept as they're needed for section navigation
            return !in_array(strtolower(basename($page->slug)), ['toc', 'readme']);
        });

        $page = $pages->firstWhere('slug', $slug);

        if (! $page) {
            return redirect()->action([DocsController::class, 'repository'], [$repository->slug, $alias->slug]);
        }

        // Redirect _index pages to their section's first page
        if ($page->isIndex()) {
            $sectionPages = $pages->filter(function ($p) use ($page) {
                return $p->section === $page->section && !$p->isIndex();
            })->sortBy('weight');

            $firstPage = $sectionPages->first();
            if ($firstPage) {
                return redirect()->action([DocsController::class, 'show'], [$repository->slug, $alias->slug, $firstPage->slug]);
            }
        }

        // Lazy render markdown at request time
        $page->contents = $this->renderMarkdown($page->contents);
        $page->contents = str_replace('<pre ', '<pre translate="no"', $page->contents);

        // Fix image paths to point to correct public directory
        $page->contents = $this->fixImagePaths($page->contents, $repository->slug, $alias->slug);

        $repositories = $docs->getRepositories();

        // Get TOC structure from toc.md file
        $tocStructure = $this->parseTocFile($repository->slug, $alias->slug);

        $navigation = $this->getNavigation($pages, $tocStructure);

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
        $toc = $this->generateTocHtml($navigation, $page, $repository, $alias, $tocStructure);

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

    private function parseTocFile(string $repository, string $alias): array
    {
        $tocPath = storage_path("docs/{$repository}/{$alias}/toc.md");

        if (!file_exists($tocPath)) {
            return [];
        }

        $tocContent = file_get_contents($tocPath);
        $lines = explode("\n", $tocContent);

        $structure = [];
        $currentSection = null;
        $sectionOrder = 0;
        $pageOrder = 0;

        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line)) {
                continue;
            }

            // Section header (starts with - but no link)
            if (preg_match('/^-\s+(.+)/', $line, $matches) && !str_contains($line, '[')) {
                $sectionTitle = trim($matches[1]);
                // Normalize section name to slug format (lowercase with hyphens)
                $currentSection = strtolower(str_replace(' ', '-', $sectionTitle));
                $structure[$currentSection] = [
                    'order' => $sectionOrder++,
                    'pages' => [],
                    'title' => $sectionTitle // Store original title for display
                ];
                $pageOrder = 0;
            }
            // Page link (contains [Title](path.md))
            elseif (preg_match('/\[([^\]]+)\]\(([^\)]+)\)/', $line, $matches)) {
                $title = $matches[1];
                $path = str_replace('.md', '', $matches[2]);

                $section = $currentSection ?? '_root';

                if (!isset($structure[$section])) {
                    $structure[$section] = [
                        'order' => $sectionOrder++,
                        'pages' => []
                    ];
                }

                $structure[$section]['pages'][$path] = [
                    'title' => $title,
                    'order' => $pageOrder++
                ];
            }
        }

        return $structure;
    }

    private function getNavigation(Collection $pages, array $tocStructure): Collection
    {
        $navigation = $pages
            ->reduce(function (array $navigation, DocumentationPage $page) use ($tocStructure) {
                $section = $page->isIndex() ? $page->section : $page->section;

                if ($page->isIndex()) {
                    $navigation[$section]['_index'] = $page;
                } else {
                    $navigation[$section]['pages'][] = $page;
                }

                return $navigation;
            }, []);

        // Sort sections based on TOC structure order only
        $sortedNavigation = collect($navigation)->sortBy(function (array $data, string $section) use ($tocStructure) {
            // Use TOC structure order if available, otherwise put at end
            return $tocStructure[$section]['order'] ?? 9999;
        });

        // Sort pages within each section based on TOC structure order only
        $sortedNavigation = $sortedNavigation->map(function (array $data, string $section) use ($tocStructure) {
            if (!isset($data['pages'])) {
                return $data;
            }

            $data['pages'] = collect($data['pages'])->sortBy(function (DocumentationPage $page) use ($tocStructure, $section) {
                // Use TOC structure order if available, otherwise put at end
                return $tocStructure[$section]['pages'][$page->slug]['order'] ?? 9999;
            })->values()->all();

            return $data;
        });

        return $sortedNavigation;
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
        // Use the configured markdown renderer (includes Torchlight for syntax highlighting)
        $renderer = app(\Spatie\LaravelMarkdown\MarkdownRenderer::class);

        // Add custom inline renderers for images and links
        $renderer->addInlineRenderer(Image::class, new ImageRenderer());
        $renderer->addInlineRenderer(Link::class, new LinkRenderer());

        return $renderer->toHtml($contents);
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

    private function generateTocHtml(Collection $navigation, DocumentationPage $currentPage, $repository, Alias $alias, array $tocStructure): string
    {
        $html = '<div class="space-y-0.5">';

        // Combine root pages and sections into a single sortable array
        $items = [];

        // Add root pages
        if (isset($navigation['_root']['pages'])) {
            foreach ($navigation['_root']['pages'] as $page) {
                // Use TOC order for root pages
                $order = $tocStructure['_root']['pages'][$page->slug]['order'] ?? 9999;

                $items[] = [
                    'type' => 'page',
                    'order' => $order,
                    'data' => $page,
                    'section' => '_root'
                ];
            }
        }

        // Add sections
        foreach ($navigation as $section => $data) {
            if ($section !== '_root') {
                // Use TOC order for sections
                $order = $tocStructure[$section]['order'] ?? 9999;

                $items[] = [
                    'type' => 'section',
                    'order' => $order,
                    'data' => $data,
                    'section' => $section
                ];
            }
        }

        // Sort all items by TOC order
        usort($items, fn($a, $b) => $a['order'] <=> $b['order']);

        // Render items in order
        foreach ($items as $item) {
            if ($item['type'] === 'page') {
                $page = $item['data'];
                $isActive = $page->slug === $currentPage->slug;
                $activeClass = $isActive
                    ? 'text-indigo-600 dark:text-indigo-400 font-semibold bg-indigo-50 dark:bg-indigo-900/20'
                    : 'text-gray-900 dark:text-gray-100 font-medium hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-gray-50 dark:hover:bg-slate-800';

                $url = route('docs.show', [$repository->slug, $alias->slug, $page->slug]);

                // Use title from TOC structure if available, otherwise use page title or format slug
                $pageTitle = $tocStructure['_root']['pages'][$page->slug]['title']
                    ?? $page->title
                    ?? $this->formatSlugToTitle($page->slug);

                $html .= sprintf(
                    '<a href="%s" class="%s text-base block px-3 py-2 rounded-md mb-1">%s</a>',
                    $url,
                    $activeClass,
                    e($pageTitle)
                );
            } else {
                // Section with title and pages (collapsible)
                $data = $item['data'];
                $section = $item['section'];
                $sectionTitle = $data['_index']->title
                    ?? $tocStructure[$section]['title']
                    ?? $this->formatSlugToTitle($section);
                $sectionId = 'section-' . str_replace(' ', '-', strtolower($sectionTitle));

                $html .= '<div class="mb-4">';
                $html .= '<button type="button" class="flex items-center w-full text-left px-3 py-2 text-base font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-slate-800 rounded-md" onclick="toggleSection(this, \'' . $sectionId . '\')">';
                // All sections open by default, arrow pointing down
                $html .= '<svg class="w-4 h-4 mr-2 transition-transform section-arrow" id="' . $sectionId . '-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
                $html .= e($sectionTitle);
                $html .= '</button>';
                // All sections visible by default
                $html .= '<ul class="mt-1 space-y-0.5 ml-5" id="' . $sectionId . '">';

                foreach ($data['pages'] as $page) {
                    $isActive = $page->slug === $currentPage->slug;
                    $activeClass = $isActive
                        ? 'text-indigo-600 dark:text-indigo-400 font-semibold bg-indigo-50 dark:bg-indigo-900/20'
                        : 'text-gray-900 dark:text-gray-100 font-medium hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-gray-50 dark:hover:bg-slate-800';

                    $url = route('docs.show', [$repository->slug, $alias->slug, $page->slug]);

                    // Use title from TOC structure if available, otherwise use page title or format slug
                    $pageTitle = $tocStructure[$section]['pages'][$page->slug]['title']
                        ?? $page->title
                        ?? $this->formatSlugToTitle($page->slug);

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

        $html .= '</div>';

        // Add script for collapsible sections (only if not already defined)
        $html .= '<script>
            if (typeof window.toggleSection === "undefined") {
                window.toggleSection = function(button, id) {
                    // Find section and arrow relative to the clicked button
                    const container = button.parentElement;
                    const section = container.querySelector("#" + id);
                    const arrow = container.querySelector("#" + id + "-arrow");

                    if (!section || !arrow) {
                        console.error("Section or arrow not found:", id);
                        return;
                    }

                    if (section.classList.contains("hidden")) {
                        section.classList.remove("hidden");
                        arrow.style.transform = "rotate(0deg)";
                    } else {
                        section.classList.add("hidden");
                        arrow.style.transform = "rotate(-90deg)";
                    }
                };
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
