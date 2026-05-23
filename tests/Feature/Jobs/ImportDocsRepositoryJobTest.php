<?php

namespace Tests\Feature\Jobs;

use App\Jobs\ImportDocsRepositoryJob;
use App\Models\DocsRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImportDocsRepositoryJobTest extends TestCase
{
    use RefreshDatabase;

    public function test_marks_repository_as_failed_when_branch_fetch_errors(): void
    {
        $repo = DocsRepository::create([
            'name' => 'broken',
            'repository' => 'this-org-does-not-exist/missing-repo',
            'category' => 'Testing',
            'docs_path' => 'docs',
        ]);

        try {
            (new ImportDocsRepositoryJob($repo))->handle();
        } catch (\Throwable $e) {
            // expected — job re-throws on failure
        }

        $repo->refresh();
        $this->assertSame('failed', $repo->last_import_status);
        $this->assertNotNull($repo->last_import_error);
    }

    public function test_resolves_explicit_branches_without_calling_github_api(): void
    {
        $repo = DocsRepository::create([
            'name' => 'pinned',
            'repository' => 'maylancerdev/missing-repo',
            'category' => 'Testing',
            'docs_path' => 'docs',
            'branches' => ['main' => 'latest'],
        ]);

        $job = new ImportDocsRepositoryJob($repo);
        $reflection = new \ReflectionMethod($job, 'resolveBranches');
        $reflection->setAccessible(true);
        $branches = $reflection->invoke($job);

        $this->assertSame(['main' => 'latest'], $branches);
    }
}
