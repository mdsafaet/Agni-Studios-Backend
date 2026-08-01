<?php

namespace App\Filament\Resources\RustyTrailerSections\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RustyTrailerSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('heading'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('video_type'),
                TextEntry::make('video_file')
                    ->placeholder('-'),
                TextEntry::make('youtube_url')
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
