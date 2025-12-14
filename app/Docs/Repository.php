<?php

namespace App\Docs;

use Illuminate\Support\Collection;

class Repository
{
    public string $slug;
    public Collection $aliases;
    public ?string $category;
    public ?string $fullName;
    public ?string $description;
    public ?string $demo;
    public ?string $support;

    public function __construct(string $slug, Collection $aliases, ?DocumentationPage $index)
    {
        $this->slug = $slug;
        $this->aliases = $aliases;
        $this->category = $index->category ?? null;

        // Load additional metadata from config
        $repoConfig = collect(config('docs.repositories'))
            ->firstWhere('name', $slug);

        if ($repoConfig) {
            $this->fullName = $repoConfig['full_name'] ?? null;
            $this->description = $repoConfig['description'] ?? null;
            $this->demo = $repoConfig['demo'] ?? null;
            $this->support = $repoConfig['support'] ?? null;
        }
    }

    public function getAlias(string $alias): ?Alias
    {
        return $this->aliases->firstWhere('slug', $alias);
    }
}
