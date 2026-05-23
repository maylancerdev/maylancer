<?php

namespace App\Filament\Resources\DocsRepositories\Pages;

use App\Filament\Resources\DocsRepositories\DocsRepositoryResource;
use App\Jobs\ImportDocsRepositoryJob;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDocsRepository extends EditRecord
{
    protected static string $resource = DocsRepositoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        ImportDocsRepositoryJob::dispatch($this->record);
    }
}
