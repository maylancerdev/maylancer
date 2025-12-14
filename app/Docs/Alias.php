<?php

namespace App\Docs;

use Illuminate\Support\Collection;

class Alias
{
    public function __construct(
        public string $slug,
        public ?string $slogan,
        public string $branch,
        public int $versionNumber,
        public string $githubUrl,
        public Collection $pages
    ) {
    }

    public static function fromDocumentationPage(DocumentationPage $page, Collection $pages): self
    {
        return new self(
            slug: $page->title,
            slogan: $page->slogan ?? null,
            branch: $page->branch,
            versionNumber: (int) filter_var($page->title, FILTER_SANITIZE_NUMBER_INT),
            githubUrl: $page->githubUrl,
            pages: $pages,
        );
    }
}
