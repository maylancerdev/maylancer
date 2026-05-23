<?php

namespace App\Filament\Resources\DocsRepositories\Tables;

use App\Jobs\ImportDocsRepositoryJob;
use App\Models\DocsRepository;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;

class DocsRepositoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('admin.resources.docs_repository.fields.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('repository')
                    ->label(__('admin.resources.docs_repository.fields.repository'))
                    ->searchable()
                    ->copyable()
                    ->url(fn (DocsRepository $record): string => $record->github_url, true),
                TextColumn::make('category')
                    ->label(__('admin.resources.docs_repository.fields.category'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('last_imported_at')
                    ->label(__('admin.resources.docs_repository.fields.last_imported_at'))
                    ->since()
                    ->sortable()
                    ->placeholder('Never'),
                TextColumn::make('last_import_status')
                    ->label(__('admin.resources.docs_repository.fields.last_import_status'))
                    ->badge()
                    ->colors([
                        'success' => 'success',
                        'danger' => 'failed',
                        'warning' => 'running',
                        'gray' => fn ($state) => blank($state),
                    ]),
                TextColumn::make('last_imported_branches')
                    ->label('Branches')
                    ->state(fn (DocsRepository $r) => $r->last_imported_branches ? count($r->last_imported_branches) : 0)
                    ->badge()
                    ->color('gray'),
                TextColumn::make('description')
                    ->label(__('admin.resources.docs_repository.fields.description'))
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('docs_path')
                    ->label(__('admin.resources.docs_repository.fields.docs_path'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('last_import_status')
                    ->label(__('admin.resources.docs_repository.fields.last_import_status'))
                    ->options([
                        'success' => 'Success',
                        'failed' => 'Failed',
                        'running' => 'Running',
                    ]),
                SelectFilter::make('category')
                    ->options(fn () => DocsRepository::query()->pluck('category', 'category')->all()),
            ])
            ->defaultSort('name')
            ->recordActions([
                Action::make('import')
                    ->label(__('admin.resources.docs_repository.actions.import_now'))
                    ->icon('heroicon-o-arrow-path')
                    ->action(function (DocsRepository $record) {
                        ImportDocsRepositoryJob::dispatch($record);
                        Notification::make()
                            ->title(__('admin.resources.docs_repository.actions.import_queued'))
                            ->success()
                            ->send();
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                Action::make('importAll')
                    ->label(__('admin.resources.docs_repository.actions.import_all'))
                    ->icon('heroicon-o-arrow-down-on-square-stack')
                    ->requiresConfirmation()
                    ->action(function () {
                        Artisan::call('docs:import', ['--all' => true]);
                        Notification::make()
                            ->title(__('admin.resources.docs_repository.actions.all_imports_queued'))
                            ->success()
                            ->send();
                    }),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
