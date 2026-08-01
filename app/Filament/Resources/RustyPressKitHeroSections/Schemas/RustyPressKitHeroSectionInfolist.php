<?php

namespace App\Filament\Resources\RustyPressKitHeroSections\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RustyPressKitHeroSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('hero_image'),
                TextEntry::make('title')
                    ->columnSpanFull(),
                TextEntry::make('subtitle'),
                TextEntry::make('button_text'),
                TextEntry::make('button_url')
                    ->placeholder('-'),
                TextEntry::make('icon_type'),
                TextEntry::make('icon')
                    ->placeholder('-'),
                ImageEntry::make('icon_image')
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
