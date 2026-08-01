<?php

namespace App\Filament\Resources\RustyPressKitFactSheets\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitFactSheetForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Fact Sheet Items'
                )
                    ->schema([
                        Repeater::make(
                            'facts'
                        )
                            ->label(
                                'Facts'
                            )
                            ->schema([
                                TextInput::make(
                                    'label'
                                )
                                    ->label(
                                        'Label'
                                    )
                                    ->placeholder(
                                        'Developer'
                                    )
                                    ->required()
                                    ->maxLength(
                                        255
                                    ),

                                TextInput::make(
                                    'value'
                                )
                                    ->label(
                                        'Value'
                                    )
                                    ->placeholder(
                                        'Agni Studios'
                                    )
                                    ->required()
                                    ->maxLength(
                                        1000
                                    ),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->addActionLabel(
                                'Add Fact'
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