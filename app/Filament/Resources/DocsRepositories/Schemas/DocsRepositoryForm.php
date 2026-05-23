<?php

namespace App\Filament\Resources\DocsRepositories\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class DocsRepositoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Repository identity')->schema([
                TextInput::make('name')
                    ->label(__('admin.resources.docs_repository.fields.name'))
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('name', Str::slug($state)) : null)
                    ->helperText('URL-safe slug used in /docs/{slug} and storage paths.'),
                TextInput::make('repository')
                    ->label(__('admin.resources.docs_repository.fields.repository'))
                    ->required()
                    ->maxLength(255)
                    ->placeholder('owner/repo')
                    ->regex('/^[\w.-]+\/[\w.-]+$/')
                    ->helperText('GitHub path in owner/repo form.'),
                TextInput::make('category')
                    ->label(__('admin.resources.docs_repository.fields.category'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('full_name')
                    ->label(__('admin.resources.docs_repository.fields.full_name'))
                    ->maxLength(255),
                Textarea::make('description')
                    ->label(__('admin.resources.docs_repository.fields.description'))
                    ->rows(3)
                    ->columnSpanFull(),
            ])->columns(2),

            Section::make('Links')->schema([
                TextInput::make('demo')
                    ->label(__('admin.resources.docs_repository.fields.demo'))
                    ->url()
                    ->maxLength(255),
                TextInput::make('support')
                    ->label(__('admin.resources.docs_repository.fields.support'))
                    ->url()
                    ->maxLength(255),
            ])->columns(2),

            Section::make('Source configuration')->schema([
                TextInput::make('docs_path')
                    ->label(__('admin.resources.docs_repository.fields.docs_path'))
                    ->default('docs')
                    ->required()
                    ->maxLength(255)
                    ->helperText("Subdirectory holding markdown files. Use '.' for repository root."),
                KeyValue::make('branches')
                    ->label(__('admin.resources.docs_repository.fields.branches'))
                    ->keyLabel('Branch')
                    ->valueLabel('Alias')
                    ->reorderable(false)
                    ->helperText('Leave empty to auto-detect branches from GitHub (main/master → latest, version branches → vN).'),
            ])->columns(1),

            Section::make('Operational state')
                ->visibleOn('edit')
                ->schema([
                    Placeholder::make('last_imported_at')
                        ->label(__('admin.resources.docs_repository.fields.last_imported_at'))
                        ->content(fn ($record) => $record?->last_imported_at?->diffForHumans() ?? 'Never'),
                    Placeholder::make('last_import_status')
                        ->label(__('admin.resources.docs_repository.fields.last_import_status'))
                        ->content(fn ($record) => $record?->last_import_status ?? '—'),
                    Placeholder::make('last_imported_branches')
                        ->label(__('admin.resources.docs_repository.fields.last_imported_branches'))
                        ->content(fn ($record) => $record?->last_imported_branches
                            ? collect($record->last_imported_branches)->map(fn ($alias, $branch) => "{$branch} → {$alias}")->implode(', ')
                            : '—'),
                    Placeholder::make('last_import_error')
                        ->label(__('admin.resources.docs_repository.fields.last_import_error'))
                        ->content(fn ($record) => $record?->last_import_error ?? '—')
                        ->columnSpanFull(),
                ])->columns(2),
        ]);
    }
}
