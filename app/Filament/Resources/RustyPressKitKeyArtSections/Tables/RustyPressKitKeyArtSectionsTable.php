<?php

namespace App\Filament\Resources\RustyPressKitKeyArtSections\Tables;

use App\Models\RustyPressKitKeyArtSection;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitKeyArtSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                TextColumn::make(
                    'key_art_count'
                )
                    ->label(
                        'Total Images'
                    )
                    ->getStateUsing(
                        fn (
                            RustyPressKitKeyArtSection $record
                        ): int =>
                            collect(
                                $record->key_arts ?? []
                            )
                                ->filter(
                                    fn (
                                        mixed $item
                                    ): bool =>
                                        is_array(
                                            $item
                                        ) &&
                                        filled(
                                            $item[
                                                'image'
                                            ] ?? null
                                        )
                                )
                                ->count()
                    )
                    ->badge(),

                TextColumn::make(
                    'key_art_names'
                )
                    ->label(
                        'Image Names'
                    )
                    ->getStateUsing(
                        fn (
                            RustyPressKitKeyArtSection $record
                        ): string =>
                            collect(
                                $record->key_arts ?? []
                            )
                                ->map(
                                    fn (
                                        mixed $item
                                    ): ?string =>
                                        is_array(
                                            $item
                                        )
                                            ? (
                                                $item[
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