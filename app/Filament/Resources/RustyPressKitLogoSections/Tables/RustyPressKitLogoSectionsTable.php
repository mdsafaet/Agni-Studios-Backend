<?php

namespace App\Filament\Resources\RustyPressKitLogoSections\Tables;

use App\Models\RustyPressKitLogoSection;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitLogoSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                TextColumn::make(
                    'logo_count'
                )
                    ->label(
                        'Total Logos'
                    )
                    ->getStateUsing(
                        fn (
                            RustyPressKitLogoSection $record
                        ): int =>
                            collect(
                                $record->logos ?? []
                            )
                                ->filter(
                                    fn (
                                        mixed $logo
                                    ): bool =>
                                        is_array(
                                            $logo
                                        ) &&
                                        filled(
                                            $logo[
                                                'image'
                                            ] ?? null
                                        )
                                )
                                ->count()
                    )
                    ->badge(),

                TextColumn::make(
                    'logo_names'
                )
                    ->label(
                        'Logo Names'
                    )
                    ->getStateUsing(
                        fn (
                            RustyPressKitLogoSection $record
                        ): string =>
                            collect(
                                $record->logos ?? []
                            )
                                ->map(
                                    fn (
                                        mixed $logo
                                    ): ?string =>
                                        is_array(
                                            $logo
                                        )
                                            ? (
                                                $logo[
                                                    'alt'
                                                ] ?? null
                                            )
                                            : null
                                )
                                ->filter()
                                ->implode(', ')
                    )
                    ->placeholder('—')
                    ->wrap(),

                TextColumn::make(
                    'updated_at'
                )
                    ->label(
                        'Last Updated'
                    )
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}