<?php

namespace App\Filament\Resources\RustyPressKitContactSocialSections\Schemas;

use App\Models\RustyPressKitContactSocialSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitContactSocialSectionInfolist
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Social Media'
                )
                    ->schema([
                        TextEntry::make(
                            'social_media_summary'
                        )
                            ->label(
                                'Social Media'
                            )
                            ->getStateUsing(
                                fn (
                                    RustyPressKitContactSocialSection $record
                                ): string =>
                                    collect(
                                        $record->social_media ?? []
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

                                                $href =
                                                    $item[
                                                        'href'
                                                    ] ?? '';

                                                if (
                                                    $label === ''
                                                ) {
                                                    return null;
                                                }

                                                return $href
                                                    ? "{$label}: {$href}"
                                                    : $label;
                                            }
                                        )
                                        ->filter()
                                        ->implode(
                                            PHP_EOL
                                        )
                            ),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}