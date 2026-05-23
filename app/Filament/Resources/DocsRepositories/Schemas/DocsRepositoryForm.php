<?php

namespace App\Filament\Resources\DocsRepositories\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DocsRepositoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('repository')
                    ->required(),
                TextInput::make('category')
                    ->required(),
                TextInput::make('full_name'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('demo'),
                TextInput::make('support'),
                TextInput::make('docs_path')
                    ->required()
                    ->default('docs'),
                TextInput::make('branches'),
                DateTimePicker::make('last_imported_at'),
                TextInput::make('last_import_status'),
                Textarea::make('last_import_error')
                    ->columnSpanFull(),
                TextInput::make('last_imported_branches'),
            ]);
    }
}
