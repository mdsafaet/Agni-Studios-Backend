<?php

namespace App\Filament\Resources\RustyPressKitKeyArtSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitKeyArtSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Key Art Images'
                )
                    ->schema([
                        Repeater::make(
                            'key_arts'
                        )
                            ->label(
                                'Key Art'
                            )
                            ->schema([
                                FileUpload::make(
                                    'image'
                                )
                                    ->label(
                                        'Image'
                                    )
                                    ->image()
                                    ->imageEditor()
                                    ->disk(
                                        'public'
                                    )
                                    ->directory(
                                        'rusty-revolver/press-kit/key-art'
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
                                        'Rusty Revolver key art'
                                    )
                                    ->nullable()
                                    ->maxLength(
                                        255
                                    ),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->addActionLabel(
                                'Add Key Art'
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