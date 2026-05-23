<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;

enum TicketPriority: string implements HasColor, HasIcon, HasLabel
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';

    public function getLabel(): string
    {
        return __('admin.ticket_priority.'.$this->value);
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Low => 'gray',
            self::Medium => 'warning',
            self::High => 'danger',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Low => Heroicon::OutlinedArrowSmallDown->value,
            self::Medium => Heroicon::OutlinedMinus->value,
            self::High => Heroicon::OutlinedArrowSmallUp->value,
        };
    }
}
