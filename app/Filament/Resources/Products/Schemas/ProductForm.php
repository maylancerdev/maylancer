<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                TextInput::make('name')
                    ->label(__('admin.resources.product.fields.name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->label(__('admin.resources.product.fields.price'))
                    ->numeric()
                    ->prefix('$')
                    ->required(),
                Textarea::make('description')
                    ->label(__('admin.resources.product.fields.description'))
                    ->maxLength(100)
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('product_thumbnail')
                    ->label(__('admin.resources.product.fields.cover'))
                    ->image()
                    ->disk('admin-uploads')
                    ->directory('products/covers'),
                Select::make('product_type')
                    ->label(__('admin.resources.product.fields.product_type'))
                    ->options(ProductType::class)
                    ->required(),
                TextInput::make('external_link')
                    ->label(__('admin.resources.product.fields.external_link'))
                    ->url()
                    ->maxLength(255),
                Toggle::make('published')
                    ->label(__('admin.resources.product.fields.published'))
                    ->default(true),
                Toggle::make('is_lifetime')
                    ->label(__('admin.resources.product.fields.is_lifetime'))
                    ->default(true),
            ])->columns(2),
        ]);
    }
}
