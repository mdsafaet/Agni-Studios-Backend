<?php

namespace App\Filament\Resources\RustyCompanionSections\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyCompanionSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Companion Content')
                    ->schema([
                        TextInput::make('heading')
                            ->label('Heading')
                            ->placeholder(
                                'Choose Your Companions'
                            )
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}