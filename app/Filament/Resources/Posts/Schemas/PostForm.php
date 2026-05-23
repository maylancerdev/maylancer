<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Content')->schema([
                TextInput::make('title')
                    ->label(__('admin.resources.post.fields.title'))
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                TextInput::make('slug')
                    ->label(__('admin.resources.post.fields.slug'))
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->label(__('admin.resources.post.fields.description'))
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                MarkdownEditor::make('text')
                    ->label(__('admin.resources.post.fields.content'))
                    ->columnSpanFull(),
            ])->columns(2),

            Section::make('Meta')->schema([
                Select::make('category_id')
                    ->label(__('admin.resources.post.fields.category'))
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                SpatieTagsInput::make('tags')
                    ->label(__('admin.resources.post.fields.tags')),
                FileUpload::make('featured_image')
                    ->label(__('admin.resources.post.fields.cover'))
                    ->image()
                    ->disk('admin-uploads')
                    ->directory('posts/covers'),
                TextInput::make('external_url')
                    ->label(__('admin.resources.post.fields.external_url'))
                    ->url()
                    ->maxLength(255),
                DateTimePicker::make('publish_date')
                    ->label(__('admin.resources.post.fields.publish_date')),
                Toggle::make('published')
                    ->label(__('admin.resources.post.fields.published')),
                Toggle::make('original_content')
                    ->label(__('admin.resources.post.fields.original_content')),
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
            ])->columns(2),
        ]);
    }
}
