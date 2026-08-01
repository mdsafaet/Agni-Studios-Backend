<?php

namespace App\Filament\Resources\RustyPressKitSections\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Press Kit Content')
                    ->schema([
                        TextInput::make('heading')
                            ->label('Title')
                            ->placeholder('Press Kit')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        TextInput::make('button_text')
                            ->label('Button Text')
                            ->placeholder('View Press Kit')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('button_url')
                            ->label('Button Link')
                            ->placeholder(
                                '/rusty-revolver/press-kit'
                            )
                            ->nullable()
                            ->maxLength(2048),
                    ])
                    ->columns(2),
            ]);
    }
}