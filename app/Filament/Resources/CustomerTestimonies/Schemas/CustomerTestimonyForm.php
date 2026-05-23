<?php

namespace App\Filament\Resources\CustomerTestimonies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerTestimonyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                TextInput::make('name')
                    ->label(__('admin.resources.testimony.fields.name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('designation')
                    ->label(__('admin.resources.testimony.fields.designation'))
                    ->required()
                    ->maxLength(255),
                Textarea::make('testimonial')
                    ->label(__('admin.resources.testimony.fields.testimonial'))
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                FileUpload::make('testimony_avatar')
                    ->label(__('admin.resources.testimony.fields.avatar'))
                    ->image()
                    ->disk('admin-uploads')
                    ->directory('testimonies/avatars'),
            ])->columns(2),
        ]);
    }
}
