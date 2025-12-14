<?php

namespace App\Docs;

use Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class DocumentationContentParser extends MarkdownWithFrontMatterParser
{
    public function parse(string $contents): array
    {
        $document = YamlFrontMatter::parse($contents);

        return array_merge(
            $document->matter(),
            ['contents' => $document->body()] // Lazy parsing - not rendered yet
        );
    }
}
