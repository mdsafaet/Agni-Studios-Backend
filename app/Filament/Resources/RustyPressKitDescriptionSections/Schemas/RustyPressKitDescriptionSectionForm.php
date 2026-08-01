<?php

namespace App\Filament\Resources\RustyPressKitDescriptionSections\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitDescriptionSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Description Content'
                )
                    ->schema([
                        Textarea::make(
                            'paragraph_one'
                        )
                            ->label(
                                'First Paragraph'
                            )
                            ->rows(5)
                            ->required()
                            ->maxLength(5000),

                        Textarea::make(
                            'paragraph_two'
                        )
                            ->label(
                                'Second Paragraph'
                            )
                            ->rows(5)
                            ->nullable()
                            ->maxLength(5000),

                        Repeater::make(
                            'description_points'
                        )
                            ->label(
                                'Description Points'
                            )
                            ->schema([
                                TextInput::make(
                                    'point'
                                )
                                    ->label(
                                        'Point'
                                    )
                                    ->required()
                                    ->maxLength(
                                        1000
                                    ),
                            ])
                            ->defaultItems(1)
                            ->addActionLabel(
                                'Add Point'
                            )
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}