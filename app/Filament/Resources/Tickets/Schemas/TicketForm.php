<?php

namespace App\Filament\Resources\Tickets\Schemas;

use App\Enums\TicketPriority;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                TextInput::make('title')
                    ->label(__('admin.resources.ticket.fields.title'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('identifier')
                    ->label(__('admin.resources.ticket.fields.identifier'))
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->default(fn () => strtoupper(Str::random(10)))
                    ->maxLength(255),
                Select::make('user_id')
                    ->label(__('admin.resources.ticket.fields.user'))
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('priority')
                    ->label(__('admin.resources.ticket.fields.priority'))
                    ->options(TicketPriority::class)
                    ->default(TicketPriority::Medium->value)
                    ->required(),
                Textarea::make('content')
                    ->label(__('admin.resources.ticket.fields.content'))
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),
            ])->columns(2),
        ]);
    }
}
