<?php

namespace App\Filament\Resources\RustyPressKitDescriptionSections\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RustyPressKitDescriptionSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('paragraph_one')
                    ->columnSpanFull(),
                TextEntry::make('paragraph_two')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('description_points')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
