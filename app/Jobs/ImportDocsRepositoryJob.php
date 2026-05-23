<?php

namespace App\Jobs;

use App\Exceptions\DocsImportException;
use App\Models\DocsRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Throwable;

class ImportDocsRepositoryJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 2;

    public array $backoff = [60, 300];

    public int $timeout = 600;

    public function __construct(public DocsRepository $repository) {}

    public function handle(): void
    {
        $this->repository->forceFill([
            'last_import_status' => 'running',
            'last_import_error' => null,
        ])->save();

        try {
            $branches = $this->resolveBranches();

            $importedBranches = [];
            foreach ($branches as $branch => $alias) {
                $process = $this->createProcessComponent($branch, $alias);
                $process->run();

                if (! $process->isSuccessful()) {
                    throw new DocsImportException("{$this->repository->name}/{$branch}: ".$process->getErrorOutput());
                }

                $importedBranches[$branch] = $alias;
            }

            $this->repository->forceFill([
                'last_imported_at' => now(),
                'last_import_status' => 'success',
                'last_imported_branches' => $importedBranches,
                'last_import_error' => null,
            ])->save();

            Cache::store('docs')->forget($this->repository->name);
        } catch (Throwable $e) {
            $this->repository->forceFill([
                'last_import_status' => 'failed',
                'last_import_error' => $e->getMessage(),
            ])->save();

            throw $e;
        } finally {
            File::deleteDirectory(storage_path('docs-temp/'.$this->repository->name));
        }
    }

    protected function resolveBranches(): array
    {
        if (! empty($this->repository->branches)) {
            return $this->repository->branches;
        }

        return $this->autoDetectBranches();
    }

    protected function autoDetectBranches(): array
    {
        $accessToken = config('services.github.docs_access_token');
        $apiUrl = "https://api.github.com/repos/{$this->repository->repository}/branches";

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: token '.$accessToken,
                'User-Agent: Maylancer-Docs',
                'Accept: application/vnd.github.v3+json',
            ],
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            return ['master' => 'latest'];
        }

        $branches = json_decode($response, true);
        if (! is_array($branches)) {
            return ['master' => 'latest'];
        }

        $branchNames = collect($branches)->pluck('name');
        $detected = [];

        if ($branchNames->contains('main')) {
            $detected['main'] = 'latest';
        } elseif ($branchNames->contains('master')) {
            $detected['master'] = 'latest';
        }

        $versionBranches = $branchNames->filter(fn ($b) => preg_match('/^v?\d+(\.\d+)?(\.\d+)?$/', $b))
            ->sort(fn ($a, $b) => version_compare(ltrim($b, 'v'), ltrim($a, 'v')));

        foreach ($versionBranches as $branch) {
            if (preg_match('/^v?(\d+)/', $branch, $m)) {
                $alias = "v{$m[1]}";
                if (! in_array($alias, $detected, true)) {
                    $detected[$branch] = $alias;
                }
            }
        }

        return empty($detected) ? ['master' => 'latest'] : $detected;
    }

    protected function createProcessComponent(string $branch, string $alias): Process
    {
        $accessToken = config('services.github.docs_access_token');
        $publicDocsAssetPath = public_path('docs');
        $docsPath = $this->repository->docs_path ?: 'docs';

        $isRootDocs = in_array($docsPath, ['.', '', '/'], true);
        $sparseCheckoutPath = $isRootDocs ? '/*' : "/{$docsPath}";
        $copySourcePath = $isRootDocs ? '*' : "{$docsPath}/*";
        $cdPath = $isRootDocs ? '.' : $docsPath;
        $name = $this->repository->name;
        $repo = $this->repository->repository;
        $category = $this->repository->category;

        return Process::fromShellCommandline(
            <<<BASH
                set -e
                rm -rf storage/docs/{$name}/{$alias}
                mkdir -p storage/docs/{$name}/{$alias}
                mkdir -p storage/docs-temp/{$name}/{$alias}
                cd storage/docs-temp/{$name}/{$alias}
                rm -rf .git
                git init
                git config core.sparseCheckout true
                echo "{$sparseCheckoutPath}" >> .git/info/sparse-checkout
                git remote add -f origin https://{$accessToken}@github.com/{$repo}.git
                git pull origin {$branch}
                cp -r {$copySourcePath} ../../../docs/{$name}/{$alias}/ 2>/dev/null || true
                echo "---\ntitle: {$alias}\ncategory: {$category}\nbranch: {$branch}\ngithubUrl: https://github.com/{$repo}\n---" > ../../../docs/{$name}/{$alias}/_index.md
                cd {$cdPath}
                find . -not -name '*.md' | cpio -pdm {$publicDocsAssetPath}/{$name}/{$alias}/ 2>/dev/null || true
            BASH,
            base_path()
        )->setTimeout($this->timeout);
    }
}
