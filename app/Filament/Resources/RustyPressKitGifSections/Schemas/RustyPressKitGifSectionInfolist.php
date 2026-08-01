<?php

namespace App\Filament\Resources\RustyPressKitGifSections\Schemas;

use App\Models\RustyPressKitGifSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitGifSectionInfolist
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'GIF Files'
                )
                    ->schema([
                        TextEntry::make(
                            'gifs_summary'
                        )
                            ->label(
                                'Uploaded GIFs'
                            )
                            ->getStateUsing(
                                function (
                                    RustyPressKitGifSection $record
                                ): string {
                                    $gifs = collect(
                                        $record->gifs ?? []
                                    )
                                        ->filter()
                                        ->values();

                                    if (
                                        $gifs->isEmpty()
                                    ) {
                                        return 'No GIFs uploaded.';
                                    }

                                    return $gifs
                                        ->implode(
                                            PHP_EOL
                                        );
                                }
                            ),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}