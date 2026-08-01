<?php

namespace App\Filament\Resources\RustyPressKitSections\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RustyPressKitSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('heading'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('button_text'),
                TextEntry::make('button_url')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
