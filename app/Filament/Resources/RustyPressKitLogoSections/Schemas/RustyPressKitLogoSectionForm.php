<?php

namespace App\Filament\Resources\RustyPressKitLogoSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitLogoSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Press Kit Logos'
                )
                    ->schema([
                        Repeater::make(
                            'logos'
                        )
                            ->label('Logos')
                            ->schema([
                                FileUpload::make(
                                    'image'
                                )
                                    ->label(
                                        'Logo Image'
                                    )
                                    ->image()
                                    ->disk(
                                        'public'
                                    )
                                    ->directory(
                                        'rusty-revolver/press-kit/logos'
                                    )
                                    ->visibility(
                                        'public'
                                    )
                                    ->required(),

                                TextInput::make(
                                    'alt'
                                )
                                    ->label(
                                        'Alternative Text'
                                    )
                                    ->placeholder(
                                        'Rusty Revolver logo'
                                    )
                                    ->nullable()
                                    ->maxLength(
                                        255
                                    ),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->addActionLabel(
                                'Add Logo'
                            )
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}