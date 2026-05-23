<?php

namespace App\Filament\Resources\DocsRepositories\Pages;

use App\Filament\Resources\DocsRepositories\DocsRepositoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDocsRepositories extends ListRecords
{
    protected static string $resource = DocsRepositoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
