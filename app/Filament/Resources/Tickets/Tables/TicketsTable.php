<?php

namespace App\Filament\Resources\Tickets\Tables;

use App\Enums\TicketPriority;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('identifier')
                    ->label(__('admin.resources.ticket.fields.identifier'))
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                TextColumn::make('title')
                    ->label(__('admin.resources.ticket.fields.title'))
                    ->searchable()
                    ->sortable()
                    ->limit(60),
                TextColumn::make('user.name')
                    ->label(__('admin.resources.ticket.fields.user'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('priority')
                    ->label(__('admin.resources.ticket.fields.priority'))
                    ->badge(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('priority')
                    ->label(__('admin.resources.ticket.fields.priority'))
                    ->options(TicketPriority::class),
            ])
            ->defaultSort('id', 'desc')
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
