<?php

namespace App\Filament\Resources\RustyPressKitHeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class RustyPressKitHeroSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Hero Background'
                )
                    ->schema([
                        FileUpload::make(
                            'hero_image'
                        )
                            ->label(
                                'Hero Background Image'
                            )
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/press-kit/hero'
                            )
                            ->visibility(
                                'public'
                            )
                            ->required(),
                    ])
                    ->columnSpanFull(),

                Section::make(
                    'Hero Content'
                )
                    ->schema([
                        Textarea::make(
                            'title'
                        )
                            ->label(
                                'Hero Title'
                            )
                            ->placeholder(
                                "Rusty\nRevolver"
                            )
                            ->helperText(
                                'Write each title line on a new line.'
                            )
                            ->rows(2)
                            ->required()
                            ->maxLength(500),

                        TextInput::make(
                            'subtitle'
                        )
                            ->label(
                                'Subtitle'
                            )
                            ->placeholder(
                                'Press Kit'
                            )
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make(
                    'Download Button'
                )
                    ->schema([
                        TextInput::make(
                            'button_text'
                        )
                            ->label(
                                'Button Text'
                            )
                            ->placeholder(
                                'Download Press Kit'
                            )
                            ->required()
                            ->maxLength(255),

                        TextInput::make(
                            'button_url'
                        )
                            ->label(
                                'Button Link'
                            )
                            ->placeholder(
                                '/downloads/press-kit.zip'
                            )
                            ->helperText(
                                'You can enter an internal path or a complete URL.'
                            )
                            ->nullable()
                            ->maxLength(2048),

                        Select::make(
                            'icon_type'
                        )
                            ->label(
                                'Button Icon Type'
                            )
                            ->options([
                                'react_icon' =>
                                    'React Icon',

                                'image' =>
                                    'Uploaded Image',
                            ])
                            ->default(
                                'react_icon'
                            )
                            ->required()
                            ->live(),

                        Select::make(
                            'icon'
                        )
                            ->label(
                                'React Icon'
                            )
                            ->options([
                                'Download' =>
                                    'Download',

                                'ExternalLink' =>
                                    'External Link',

                                'Play' =>
                                    'Play',
                            ])
                            ->default(
                                'Download'
                            )
                            ->nullable()
                            ->visible(
                                fn (Get $get): bool =>
                                    $get(
                                        'icon_type'
                                    ) ===
                                    'react_icon'
                            ),

                        FileUpload::make(
                            'icon_image'
                        )
                            ->label(
                                'Button Icon Image'
                            )
                            ->image()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/press-kit/button-icons'
                            )
                            ->visibility(
                                'public'
                            )
                            ->nullable()
                            ->visible(
                                fn (Get $get): bool =>
                                    $get(
                                        'icon_type'
                                    ) ===
                                    'image'
                            ),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}