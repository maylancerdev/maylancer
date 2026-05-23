<?php

namespace App\Filament\Resources\DocsRepositories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DocsRepositoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('repository')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('demo')
                    ->searchable(),
                TextColumn::make('support')
                    ->searchable(),
                TextColumn::make('docs_path')
                    ->searchable(),
                TextColumn::make('last_imported_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('last_import_status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
