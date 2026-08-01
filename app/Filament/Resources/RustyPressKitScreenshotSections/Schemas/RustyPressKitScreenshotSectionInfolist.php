<?php

namespace App\Filament\Resources\RustyPressKitScreenshotSections\Schemas;

use App\Models\RustyPressKitScreenshotSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitScreenshotSectionInfolist
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Screenshots'
                )
                    ->schema([
                        TextEntry::make(
                            'screenshots_summary'
                        )
                            ->label(
                                'Uploaded Screenshots'
                            )
                            ->getStateUsing(
                                function (
                                    RustyPressKitScreenshotSection $record
                                ): string {
                                    $screenshots =
                                        collect(
                                            $record->screenshots ?? []
                                        )
                                            ->filter()
                                            ->values();

                                    if (
                                        $screenshots->isEmpty()
                                    ) {
                                        return 'No screenshots uploaded.';
                                    }

                                    return $screenshots
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