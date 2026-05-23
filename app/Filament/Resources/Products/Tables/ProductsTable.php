<?php

namespace App\Filament\Resources\Products\Tables;

use App\Enums\ProductType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('product_thumbnail')
                    ->label(__('admin.resources.product.fields.cover'))
                    ->disk('admin-uploads')
                    ->square()
                    ->size(48),
                TextColumn::make('name')
                    ->label(__('admin.resources.product.fields.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label(__('admin.resources.product.fields.price'))
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('product_type')
                    ->label(__('admin.resources.product.fields.product_type'))
                    ->badge(),
                IconColumn::make('published')
                    ->label(__('admin.resources.product.fields.published'))
                    ->boolean(),
                IconColumn::make('is_lifetime')
                    ->label(__('admin.resources.product.fields.is_lifetime'))
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('product_type')
                    ->label(__('admin.resources.product.fields.product_type'))
                    ->options(ProductType::class),
                TernaryFilter::make('published')
                    ->label(__('admin.resources.product.fields.published')),
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
