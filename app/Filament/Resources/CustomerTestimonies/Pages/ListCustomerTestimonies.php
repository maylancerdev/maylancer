<?php

namespace App\Filament\Resources\CustomerTestimonies\Pages;

use App\Filament\Resources\CustomerTestimonies\CustomerTestimonyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerTestimonies extends ListRecords
{
    protected static string $resource = CustomerTestimonyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
