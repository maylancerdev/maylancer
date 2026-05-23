<?php

namespace App\Console\Commands;

use App\Jobs\ImportDocsRepositoryJob;
use App\Models\DocsRepository;
use App\Support\ValueStores\UpdatedRepositoriesValueStore;
use Illuminate\Console\Command;

class ImportDocsFromRepositoriesCommand extends Command
{
    protected $signature = 'docs:import {--repo=} {--all}';

    protected $description = 'Dispatch import jobs for documentation repositories';

    public function handle(): void
    {
        $valueStore = UpdatedRepositoriesValueStore::make();
        $updatedNames = collect($valueStore->getNames());

        if ($extra = $this->option('repo')) {
            $updatedNames->push($extra);
        }

        if ($this->option('all')) {
            $updatedNames = DocsRepository::pluck('repository');
        }

        $repositories = DocsRepository::all()->keyBy('repository');

        $dispatched = 0;
        foreach ($updatedNames->unique() as $name) {
            $repository = $repositories->get($name) ?? DocsRepository::firstWhere('name', $name);
            if (! $repository) {
                $this->warn("Skipping unknown repository: {$name}");
                continue;
            }

            ImportDocsRepositoryJob::dispatch($repository);
            $this->info("Queued import for {$repository->name}");
            $dispatched++;
        }

        if ($dispatched === 0) {
            $this->info('No repositories to import.');
        } else {
            $this->info("Dispatched {$dispatched} import job(s).");
        }

        $valueStore->flush();
    }
}
