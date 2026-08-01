<?php

namespace App\Filament\Resources\RustyRevolverJoinSections\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyRevolverJoinSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Join the Rebel Content')
                    ->schema([
                        TextInput::make('heading')
                            ->label('Heading')
                            ->placeholder('Join the Rebel')
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