<?php

namespace App\Filament\Resources\AboutSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AboutSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('heading')
                    ->label('Heading')
                    ->helperText(
                        'Enter each heading line on a new line.'
                    )
                    ->rows(3)
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(6)
                    ->required()
                    ->maxLength(1000)
                    ->columnSpanFull(),
            ]);
    }
}