<?php

namespace App\Http\Controllers\Docs;

use App\Documentation;
use App\Http\Controllers\Controller;
use DOMDocument;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller
{
	/**
	 * @var \App\Documentation
	 */
	protected $docs;

	/**
     * Create a new controller instance.
     *
	 * @param \App\Documentation $docs
	 */
	public function __construct(Documentation $docs)
	{
		$this->docs = $docs;
	}

	/**
     * Show all docs.
     *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
	public function index()
	{
        return view('frontpage.docs.index', ['docs' => $this->docs->all()]);
	}

	/**
     * Show a documentation page.
     *
	 * @param string $doc
	 * @param string|null $version
	 * @param string|null $page
	 */
	public function show(string $doc, string $version = null, string $page = null)
	{

        if (is_null($version)) {
			$version = $this->docs->getDefaultVersion($doc);

            if (is_null($version)) {
                abort(404);
            }

			return redirect()->route('show', [$doc, $version]);
		}

        if (is_null($page)) {
            $page = $this->docs->getDefaultPage($doc, 'introduction');
        }


		$content = $this->docs->getContent($doc, $version, $page);

        $content = $this->docs->replaceImagePath($content, $doc, $version);


        if (is_null($content)) {
            abort(404);
        }

        $title = (new Crawler($content))->filterXPath('//h1');
        $title = count($title) ? $title->text() : null;

        $tableOfContents = $this->extractTableOfContents($content);


		return view('frontpage.docs.show', [
			'toc' => $this->docs->getToc($doc, $version),
            'title' => $title,
			'content' => $content,
			'currentDoc' => $this->docs->all()[$doc],
			'currentVersion' => $version,
            'doc' => $doc,
            'version' => $version,
			'docs' => $this->docs->all(),
			'versions' => $this->docs->getVersions($doc),
            'page' => $page,
            'tableOfContents' => $tableOfContents
		]);
	}

    private function extractTableOfContents(string $contents): array
    {
        $headings = [];
        $allowedTags = ['h2'];

        $dom = new DOMDocument();
        $internalErrors = libxml_use_internal_errors(true);
        $dom->loadHTML($contents);
        libxml_use_internal_errors($internalErrors);

        foreach ($allowedTags as $tag) {
            $elements = $dom->getElementsByTagName($tag);
            foreach ($elements as $element) {
                $text = Str::replace('#', '', $element->nodeValue);
                $id = replace_characters($text);
                $element->setAttribute('id', $id);
                $headings[] = ['text' => $text, 'id' => $id];
            }
        }

        return $headings;
    }



}
