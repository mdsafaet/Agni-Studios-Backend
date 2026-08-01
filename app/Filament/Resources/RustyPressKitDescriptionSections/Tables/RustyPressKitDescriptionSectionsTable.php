<?php

namespace App\Filament\Resources\RustyPressKitDescriptionSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitDescriptionSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                TextColumn::make(
                    'paragraph_one'
                )
                    ->label(
                        'First Paragraph'
                    )
                    ->limit(70)
                    ->wrap()
                    ->searchable()
                    ->placeholder('—'),

                TextColumn::make(
                    'paragraph_two'
                )
                    ->label(
                        'Second Paragraph'
                    )
                    ->limit(70)
                    ->wrap()
                    ->searchable()
                    ->placeholder('—'),

                TextColumn::make(
                    'description_points'
                )
                    ->label(
                        'Description Points'
                    )
                    ->formatStateUsing(
                        function (
                            mixed $state
                        ): string {
                            if (
                                is_string($state)
                            ) {
                                $state =
                                    json_decode(
                                        $state,
                                        true
                                    );
                            }

                            if (
                                ! is_array($state)
                            ) {
                                return '—';
                            }

                            return collect($state)
                                ->map(
                                    function (
                                        mixed $item
                                    ): ?string {
                                        if (
                                            is_string(
                                                $item
                                            )
                                        ) {
                                            return $item;
                                        }

                                        if (
                                            is_array(
                                                $item
                                            )
                                        ) {
                                            return $item[
                                                'point'
                                            ] ?? null;
                                        }

                                        return null;
                                    }
                                )
                                ->filter()
                                ->implode(', ');
                        }
                    )
                    ->limit(100)
                    ->wrap()
                    ->placeholder('—'),

                TextColumn::make(
                    'created_at'
                )
                    ->label(
                        'Created'
                    )
                    ->dateTime()
                    ->sortable()
                    ->toggleable(
                        isToggledHiddenByDefault:
                            true
                    ),

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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}