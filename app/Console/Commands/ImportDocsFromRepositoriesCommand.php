<?php

namespace App\Console\Commands;

use App\Exceptions\DocsImportException;
use App\Support\ValueStores\UpdatedRepositoriesValueStore;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\Fork\Fork;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Process\Process;

class ImportDocsFromRepositoriesCommand extends Command
{
    protected $signature = 'docs:import {--repo=} {--all}';

    protected $description = 'Fetches docs from all repositories in config/docs.php';

    public function handle(): void
    {
        $this->info('Importing docs...');

        $updatedRepositoriesValueStore = UpdatedRepositoriesValueStore::make();

        $updatedRepositoryNames = $updatedRepositoriesValueStore->getNames();

        if ($extraRepo = $this->option('repo')) {
            $updatedRepositoryNames[] = $extraRepo;
        }

        $this->cleanRepositoryFolders();

        if ($this->option('all')) {
            $updatedRepositoryNames = collect(config('docs.repositories'))
                ->map(function (array $repository) {
                    return $repository['repository'];
                })
                ->toArray();
        }

        $this->info(count($updatedRepositoryNames) . ' repositories.');

        $callables = $this->convertRepositoriesToCallables($updatedRepositoryNames);

        $this->getOutput()->progressStart(count($callables));

        Fork::new()
            ->after(parent: fn () => $this->getOutput()->progressAdvance())
            ->concurrent(4)
            ->run(...$callables);

        $this->getOutput()->progressFinish();

        $this->info('Fetched & cached docs from all repositories.');

        $updatedRepositoriesValueStore->flush();

        File::deleteDirectory(storage_path('docs-temp'));

        Cache::store('docs')->clear();

        $this->info('All done!');
    }

    protected function convertRepositoriesToCallables(
        array $updatedRepositoryNames
    ): array {
        $repositoriesWithDocs = $this->getRepositoriesWithDocs();

        return collect($updatedRepositoryNames)
            ->map(fn (string $repositoryName) => $repositoriesWithDocs[$repositoryName] ?? null)
            ->filter()
            ->flatMap(function (array $repository) {
                // Auto-detect branches if not manually configured
                $branches = $repository['branches'] ?? $this->autoDetectBranches($repository);

                return collect($branches)
                    ->map(fn (string $alias, string $branch) => [$repository, $alias, $branch])
                    ->values()
                    ->toArray();
            })
            ->mapSpread(function (array $repository, string $alias, string $branch) {
                $process = $this->createProcessComponent($repository, $branch, $alias);

                $this->info("Created import process for {$repository['name']} {$branch}");

                return function () use ($process, $repository) {
                    $process->run();

                    if (! $process->isSuccessful()) {
                        $this->error($repository['name'] . ': ' . $process->getErrorOutput());
                        report(new DocsImportException("Import for repository {$repository['name']} unsuccessful: " . $process->getErrorOutput()));
                    }
                };
            })
            ->toArray();
    }

    protected function getRepositoriesWithDocs(): Collection
    {
        return collect(config('docs.repositories'))->keyBy('repository');
    }

    protected function createProcessComponent(array $repository, string $branch, string $alias): Process
    {
        $accessToken = config('services.github.docs_access_token');
        $publicDocsAssetPath = public_path('docs');
        $docsPath = $repository['docs_path'] ?? 'docs';

        // Handle root-level docs (when docs_path is '.' or empty)
        $isRootDocs = in_array($docsPath, ['.', '', '/']);
        $sparseCheckoutPath = $isRootDocs ? '/*' : "/{$docsPath}";
        $copySourcePath = $isRootDocs ? '*' : "{$docsPath}/*";
        $cdPath = $isRootDocs ? '.' : $docsPath;

        return Process::fromShellCommandline(
            <<<BASH
                rm -rf storage/docs/{$repository['name']}/{$alias} \
                && mkdir -p storage/docs/{$repository['name']}/{$alias} \
                && mkdir -p storage/docs-temp/{$repository['name']}/{$alias} \
                && cd storage/docs-temp/{$repository['name']}/{$alias} \
                && rm -rf .git \
                && git init \
                && git config core.sparseCheckout true \
                && echo "{$sparseCheckoutPath}" >> .git/info/sparse-checkout \
                && git remote add -f origin https://{$accessToken}@github.com/{$repository['repository']}.git \
                && git pull origin ${branch} \
                && cp -r {$copySourcePath} ../../../docs/{$repository['name']}/{$alias}/ 2>/dev/null || true \
                && echo "---\ntitle: {$alias}\ncategory: {$repository['category']}\nbranch: {$branch}\ngithubUrl: https://github.com/{$repository['repository']}\n---" > ../../../docs/{$repository['name']}/{$alias}/_index.md \
                && cd {$cdPath} \
                && find . -not -name '*.md' | cpio -pdm {$publicDocsAssetPath}/{$repository['name']}/{$alias}/ 2>/dev/null || true
            BASH
            ,
            base_path()
        );
    }

    protected function autoDetectBranches(array $repository): array
    {
        $this->info("Auto-detecting branches for {$repository['repository']}...");

        $accessToken = config('services.github.docs_access_token');
        $apiUrl = "https://api.github.com/repos/{$repository['repository']}/branches";

        // Fetch branches from GitHub API
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: token ' . $accessToken,
                'User-Agent: Maylancer-Docs',
                'Accept: application/vnd.github.v3+json',
            ],
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            $this->error("Failed to fetch branches for {$repository['repository']} (HTTP {$httpCode})");
            return ['master' => 'latest']; // Fallback to master branch
        }

        $branches = json_decode($response, true);

        if (! is_array($branches)) {
            $this->error("Invalid response from GitHub API for {$repository['repository']}");
            return ['master' => 'latest'];
        }

        // Extract branch names
        $branchNames = collect($branches)->pluck('name');

        // Map branches to aliases based on patterns
        $detectedBranches = [];

        // Priority order: main/master first, then version branches
        if ($branchNames->contains('main')) {
            $detectedBranches['main'] = 'latest';
        } elseif ($branchNames->contains('master')) {
            $detectedBranches['master'] = 'latest';
        }

        // Detect version branches (v1, v2, v3, etc.)
        $versionBranches = $branchNames->filter(function ($branch) {
            return preg_match('/^v?\d+(\.\d+)?(\.\d+)?$/', $branch);
        })->sort(function ($a, $b) {
            // Sort in descending order (newest version first)
            return version_compare($this->normalizeVersion($b), $this->normalizeVersion($a));
        });

        foreach ($versionBranches as $branch) {
            // Generate alias: v2 -> v2, 2.0 -> v2, 1.1 -> v1
            if (preg_match('/^v?(\d+)/', $branch, $matches)) {
                $majorVersion = $matches[1];
                $alias = "v{$majorVersion}";

                // Only add if we don't already have this alias
                if (! in_array($alias, $detectedBranches)) {
                    $detectedBranches[$branch] = $alias;
                }
            }
        }

        if (empty($detectedBranches)) {
            $this->warn("No version branches detected for {$repository['repository']}, using master as fallback");
            return ['master' => 'latest'];
        }

        $this->info('Detected branches: ' . collect($detectedBranches)->map(fn($alias, $branch) => "{$branch} => {$alias}")->implode(', '));

        return $detectedBranches;
    }

    protected function normalizeVersion(string $version): string
    {
        // Remove 'v' prefix and ensure it's in a comparable format
        return ltrim($version, 'v');
    }

    private function cleanRepositoryFolders(): void
    {
        $publicDocsPath = public_path('docs');
        $storageDocsPath = storage_path('docs');

        File::ensureDirectoryExists($publicDocsPath);
        File::ensureDirectoryExists($storageDocsPath);

        $directoriesToKeep = collect(config('docs.repositories'))->pluck('name');

        $finder = new Finder();
        $directories = $finder->in([$storageDocsPath, $publicDocsPath])->depth(0)->directories();

        foreach ($directories as $directory) {
            if (! $directoriesToKeep->contains($directory->getFilename())) {
                File::deleteDirectory($directory->getRealPath());
            }
        }
    }
}
