<?php

namespace App\Filament\Resources\DocsRepositories\Pages;

use App\Filament\Resources\DocsRepositories\DocsRepositoryResource;
use App\Jobs\ImportDocsRepositoryJob;
use Filament\Resources\Pages\CreateRecord;

class CreateDocsRepository extends CreateRecord
{
    protected static string $resource = DocsRepositoryResource::class;

    protected function afterCreate(): void
    {
        ImportDocsRepositoryJob::dispatch($this->record);
    }
}
