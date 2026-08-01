<?php

namespace App\Filament\Resources\RustyPressKitKeyArtSections\Schemas;

use App\Models\RustyPressKitKeyArtSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitKeyArtSectionInfolist
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Key Art Images'
                )
                    ->schema([
                        TextEntry::make(
                            'key_arts_summary'
                        )
                            ->label(
                                'Uploaded Key Art'
                            )
                            ->getStateUsing(
                                function (
                                    RustyPressKitKeyArtSection $record
                                ): string {
                                    $items = collect(
                                        $record->key_arts ?? []
                                    )
                                        ->map(
                                            function (
                                                mixed $item,
                                                int $index
                                            ): ?string {
                                                if (
                                                    ! is_array(
                                                        $item
                                                    )
                                                ) {
                                                    return null;
                                                }

                                                $image =
                                                    $item['image'] ?? null;

                                                if (! $image) {
                                                    return null;
                                                }

                                                $alt =
                                                    $item['alt'] ??
                                                    'Key Art ' .
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
                                        $items->isEmpty()
                                    ) {
                                        return 'No Key Art uploaded.';
                                    }

                                    return $items->implode(
                                        PHP_EOL
                                    );
                                }
                            ),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
