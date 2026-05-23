<?php

namespace App\Filament\Resources\DocsRepositories;

use App\Filament\Resources\DocsRepositories\Pages\CreateDocsRepository;
use App\Filament\Resources\DocsRepositories\Pages\EditDocsRepository;
use App\Filament\Resources\DocsRepositories\Pages\ListDocsRepositories;
use App\Filament\Resources\DocsRepositories\Schemas\DocsRepositoryForm;
use App\Filament\Resources\DocsRepositories\Tables\DocsRepositoriesTable;
use App\Models\DocsRepository;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DocsRepositoryResource extends Resource
{
    protected static ?string $model = DocsRepository::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static string|UnitEnum|null $navigationGroup = 'Docs';

    protected static ?int $navigationSort = 70;

    public static function getModelLabel(): string
    {
        return __('admin.resources.docs_repository.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.docs_repository.plural');
    }

    public static function form(Schema $schema): Schema
    {
        return DocsRepositoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DocsRepositoriesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDocsRepositories::route('/'),
            'create' => CreateDocsRepository::route('/create'),
            'edit' => EditDocsRepository::route('/{record}/edit'),
        ];
    }
}
