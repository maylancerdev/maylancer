<?php

namespace App\Filament\Resources\CustomerTestimonies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomerTestimoniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('testimony_avatar')
                    ->label(__('admin.resources.testimony.fields.avatar'))
                    ->disk('admin-uploads')
                    ->circular()
                    ->size(48),
                TextColumn::make('name')
                    ->label(__('admin.resources.testimony.fields.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('designation')
                    ->label(__('admin.resources.testimony.fields.designation'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('testimonial')
                    ->label(__('admin.resources.testimony.fields.testimonial'))
                    ->limit(80)
                    ->wrap(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
