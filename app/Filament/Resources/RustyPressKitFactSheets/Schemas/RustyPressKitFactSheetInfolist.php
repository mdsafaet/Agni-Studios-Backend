<?php

namespace App\Filament\Resources\RustyPressKitFactSheets\Schemas;

use App\Models\RustyPressKitFactSheet;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitFactSheetInfolist
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Fact Sheet Items'
                )
                    ->schema([
                        TextEntry::make(
                            'facts_summary'
                        )
                            ->label(
                                'Facts'
                            )
                            ->getStateUsing(
                                function (
                                    RustyPressKitFactSheet $record
                                ): string {
                                    return collect(
                                        $record->facts ?? []
                                    )
                                        ->map(
                                            function (
                                                mixed $item
                                            ): ?string {
                                                if (
                                                    ! is_array(
                                                        $item
                                                    )
                                                ) {
                                                    return null;
                                                }

                                                $label =
                                                    $item[
                                                        'label'
                                                    ] ?? '';

                                                $value =
                                                    $item[
                                                        'value'
                                                    ] ?? '';

                                                if (
                                                    $label === '' &&
                                                    $value === ''
                                                ) {
                                                    return null;
                                                }

                                                return "{$label}: {$value}";
                                            }
                                        )
                                        ->filter()
                                        ->implode(
                                            PHP_EOL
                                        );
                                }
                            )
                            ->listWithLineBreaks(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}