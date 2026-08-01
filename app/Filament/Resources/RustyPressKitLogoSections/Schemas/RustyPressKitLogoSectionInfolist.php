<?php

namespace App\Filament\Resources\RustyPressKitLogoSections\Schemas;

use App\Models\RustyPressKitLogoSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitLogoSectionInfolist
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Press Kit Logos'
                )
                    ->schema([
                        TextEntry::make(
                            'logos_summary'
                        )
                            ->label(
                                'Uploaded Logos'
                            )
                            ->getStateUsing(
                                function (
                                    RustyPressKitLogoSection $record
                                ): string {
                                    $logos = collect(
                                        $record->logos ?? []
                                    )
                                        ->map(
                                            function (
                                                mixed $logo,
                                                int $index
                                            ): ?string {
                                                if (
                                                    ! is_array(
                                                        $logo
                                                    )
                                                ) {
                                                    return null;
                                                }

                                                $image =
                                                    $logo[
                                                        'image'
                                                    ] ?? null;

                                                if (! $image) {
                                                    return null;
                                                }

                                                $alt =
                                                    $logo[
                                                        'alt'
                                                    ] ??
                                                    'Logo ' .
                                                    (
                                                        $index +
                                                        1
                                                    );

                                                return "{$alt}: {$image}";
                                            }
                                        )
                                        ->filter()
                                        ->values();

                                    if (
                                        $logos->isEmpty()
                                    ) {
                                        return 'No logos uploaded.';
                                    }

                                    return $logos->implode(
                                        PHP_EOL
                                    );
                                }
                            ),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}