<?php

namespace App\Filament\Resources\RustyRevolverButtons\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;

class RustyRevolverButtonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Button Details')
                    ->schema([
                        TextInput::make('text')
                            ->label('Button Text')
                            ->placeholder('Watch Video')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('url')
                            ->label('Button Link')
                            ->placeholder(
                                '#trailer or https://example.com'
                            )
                            ->nullable()
                            ->maxLength(2048),

                        Select::make('icon_type')
                            ->label('Icon Type')
                            ->options([
                                'react_icon' => 'React Icon',
                                'image' => 'Uploaded Image',
                            ])
                            ->default('react_icon')
                            ->required()
                            ->live()
                            ->native(false),

                        Select::make('icon')
                            ->label('React Icon')
                            ->options([
                                'Play' => 'Play',
                                'Download' => 'Download',
                            ])
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('icon_type') ===
                                    'react_icon'
                            )
                            ->nullable()
                            ->native(false),

                        FileUpload::make('icon_image')
                            ->label('Icon Image')
                            ->image()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/button-icons'
                            )
                            ->visibility('public')
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('icon_type') ===
                                    'image'
                            )
                            ->nullable(),

                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}