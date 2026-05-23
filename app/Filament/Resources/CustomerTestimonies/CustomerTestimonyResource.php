<?php

namespace App\Filament\Resources\CustomerTestimonies;

use App\Filament\Resources\CustomerTestimonies\Pages\CreateCustomerTestimony;
use App\Filament\Resources\CustomerTestimonies\Pages\EditCustomerTestimony;
use App\Filament\Resources\CustomerTestimonies\Pages\ListCustomerTestimonies;
use App\Filament\Resources\CustomerTestimonies\Schemas\CustomerTestimonyForm;
use App\Filament\Resources\CustomerTestimonies\Tables\CustomerTestimoniesTable;
use App\Models\CustomerTestimony;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CustomerTestimonyResource extends Resource
{
    protected static ?string $model = CustomerTestimony::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static string|UnitEnum|null $navigationGroup = 'Marketing';

    protected static ?int $navigationSort = 50;

    public static function getModelLabel(): string
    {
        return __('admin.resources.testimony.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.testimony.plural');
    }

    public static function form(Schema $schema): Schema
    {
        return CustomerTestimonyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerTestimoniesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerTestimonies::route('/'),
            'create' => CreateCustomerTestimony::route('/create'),
            'edit' => EditCustomerTestimony::route('/{record}/edit'),
        ];
    }
}
