<?php

namespace App\Filament\Resources\CustomerTestimonies\Pages;

use App\Filament\Resources\CustomerTestimonies\CustomerTestimonyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerTestimony extends CreateRecord
{
    protected static string $resource = CustomerTestimonyResource::class;
}
