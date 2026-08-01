<?php

namespace App\Filament\Resources\FooterIcons\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class FooterIconForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Footer Icon')
                    ->schema([
                        Select::make('icon_type')
                            ->label('Icon Type')
                            ->options([
                                'react_icon' => 'React Icon',
                                'image' => 'Uploaded Image',
                            ])
                            ->default('react_icon')
                            ->required()
                            ->live(),

                        Select::make('icon')
                            ->label('Social Icon')
                            ->options([
                                'Facebook' => 'Facebook',
                                'Twitch' => 'Twitch',
                                'LinkedIn' => 'LinkedIn',
                                'Snapchat' => 'Snapchat',
                                'TikTok' => 'TikTok',
                                'X' => 'X',
                                'Discord' => 'Discord',
                                'YouTube' => 'YouTube',
                            ])
                            ->searchable()
                            ->native(false)
                            ->required(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'react_icon'
                            )
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'react_icon'
                            ),

                        FileUpload::make('icon_image')
                            ->label('Icon Image')
                            ->disk('public')
                            ->directory('footer/icons')
                            ->visibility('public')
                            ->image()
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                                'image/svg+xml',
                            ])
                            ->maxSize(2048)
                            ->required(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'image'
                            )
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'image'
                            ),

                        TextInput::make('label')
                            ->label('Icon Label')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('href')
                            ->label('Social Link')
                            ->url()
                            ->nullable()
                            ->maxLength(2048),

                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(255)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Show Icon')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}