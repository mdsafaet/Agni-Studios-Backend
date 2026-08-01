<?php

namespace App\Filament\Resources\RustyPressKitPressReleases\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitPressReleaseForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Press Release'
                )
                    ->schema([
                        FileUpload::make(
                            'image'
                        )
                            ->label(
                                'Cover Image'
                            )
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/press-kit/press-releases'
                            )
                            ->visibility(
                                'public'
                            )
                            ->nullable(),

                        TextInput::make(
                            'title'
                        )
                            ->label('Title')
                            ->required()
                            ->maxLength(255),

                        Textarea::make(
                            'body'
                        )
                            ->label(
                                'Description'
                            )
                            ->rows(6)
                            ->required()
                            ->maxLength(10000)
                            ->columnSpanFull(),

                        TextInput::make(
                            'link'
                        )
                            ->label('Link')
                            ->placeholder(
                                'https://www.agnistudios.com/news'
                            )
                            ->helperText(
                                'Complete URLs and internal paths are supported.'
                            )
                            ->nullable()
                            ->maxLength(2048),

                        TextInput::make(
                            'sort_order'
                        )
                            ->label(
                                'Display Order'
                            )
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->required(),

                        Toggle::make(
                            'is_active'
                        )
                            ->label('Active')
                            ->default(true)
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}