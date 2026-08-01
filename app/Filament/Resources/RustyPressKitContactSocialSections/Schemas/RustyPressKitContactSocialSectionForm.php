<?php

namespace App\Filament\Resources\RustyPressKitContactSocialSections\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitContactSocialSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Social Media'
                )
                    ->schema([
                        Repeater::make(
                            'social_media'
                        )
                            ->label(
                                'Social Media Links'
                            )
                            ->schema([
                                TextInput::make(
                                    'label'
                                )
                                    ->label(
                                        'Name'
                                    )
                                    ->placeholder(
                                        'Discord'
                                    )
                                    ->required()
                                    ->maxLength(
                                        255
                                    ),

                                TextInput::make(
                                    'href'
                                )
                                    ->label(
                                        'Link'
                                    )
                                    ->placeholder(
                                        'https://discord.gg/example'
                                    )
                                    ->nullable()
                                    ->maxLength(
                                        2048
                                    ),

                                Toggle::make(
                                    'is_active'
                                )
                                    ->label(
                                        'Active'
                                    )
                                    ->default(
                                        true
                                    ),
                            ])
                            ->columns(3)
                            ->defaultItems(1)
                            ->addActionLabel(
                                'Add Social Media'
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