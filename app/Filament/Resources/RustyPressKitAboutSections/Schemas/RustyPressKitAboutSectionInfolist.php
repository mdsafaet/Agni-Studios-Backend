<?php

namespace App\Filament\Resources\RustyPressKitAboutSections\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RustyPressKitAboutSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('cover_image'),
                TextEntry::make('paragraph_one')
                    ->columnSpanFull(),
                TextEntry::make('paragraph_two')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('bottom_icon')
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
