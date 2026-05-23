<?php

namespace App\Filament\Resources\CustomerTestimonies\Pages;

use App\Filament\Resources\CustomerTestimonies\CustomerTestimonyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerTestimony extends EditRecord
{
    protected static string $resource = CustomerTestimonyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
