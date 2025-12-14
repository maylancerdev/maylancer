<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class ImportDocsForRepositoryJob implements ShouldQueue
{
    use Queueable;

    public function __construct(protected string $repositoryName)
    {
    }

    public function handle(): void
    {
        $repository = collect(config('docs.repositories'))
            ->keyBy('name')
            ->get($this->repositoryName);

        if (! $repository) {
            return;
        }

        foreach ($repository['branches'] as $branch => $alias) {
            $this->importAlias($repository, $branch, $alias);
        }
    }

    protected function importAlias(array $repository, string $branch, string $alias): void
    {
        $accessToken = config('services.github.docs_access_token');
        $publicDocsAssetPath = public_path('docs');
        $tempPath = storage_path('docs-temp') . '/' . $repository['name'] . '/' . $alias;

        $process = Process::fromShellCommandline(
            <<<BASH
                rm -rf storage/docs/{$repository['name']}/{$alias} \
                && mkdir -p storage/docs/{$repository['name']}/{$alias} \
                && mkdir -p storage/docs-temp/{$repository['name']}/{$alias} \
                && cd storage/docs-temp/{$repository['name']}/{$alias} \
                && rm -rf .git \
                && git init \
                && git config core.sparseCheckout true \
                && echo "/docs" >> .git/info/sparse-checkout \
                && git remote add -f origin https://{$accessToken}@github.com/{$repository['repository']}.git \
                && git pull origin ${branch} \
                && cp -r docs/* ../../../docs/{$repository['name']}/{$alias} \
                && echo "---\ntitle: {$alias}\ncategory: {$repository['category']}\nbranch: {$branch}\ngithubUrl: https://github.com/{$repository['repository']}\n---" > ../../../docs/{$repository['name']}/{$alias}/_index.md \
                && cd docs/ \
                && find . -not -name '*.md' | cpio -pdm {$publicDocsAssetPath}/{$repository['name']}/{$alias}/
            BASH
            ,
            base_path()
        );

        $process->run();

        File::deleteDirectory($tempPath);
    }
}
