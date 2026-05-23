<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;

enum ProductType: string implements HasColor, HasIcon, HasLabel
{
    case Course = 'course';
    case License = 'license';
    case Ebook = 'ebook';

    public function getLabel(): string
    {
        return __('admin.product_type.'.$this->value);
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Course => 'success',
            self::License => 'warning',
            self::Ebook => 'info',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Course => Heroicon::OutlinedAcademicCap->value,
            self::License => Heroicon::OutlinedKey->value,
            self::Ebook => Heroicon::OutlinedBookOpen->value,
        };
    }
}
