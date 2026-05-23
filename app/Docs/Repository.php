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

        $repoModel = \App\Models\DocsRepository::firstWhere('name', $slug);

        if ($repoModel) {
            $this->fullName = $repoModel->full_name;
            $this->description = $repoModel->description;
            $this->demo = $repoModel->demo;
            $this->support = $repoModel->support;
        }
    }

    public function getAlias(string $alias): ?Alias
    {
        return $this->aliases->firstWhere('slug', $alias);
    }
}
