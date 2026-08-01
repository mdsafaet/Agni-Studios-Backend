<?php

namespace App\Filament\Resources\RustyPressKitFactSheets\Tables;

use App\Models\RustyPressKitFactSheet;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitFactSheetsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                TextColumn::make(
                    'facts_summary'
                )
                    ->label(
                        'Fact Sheet Items'
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
                                ->implode(', ');
                        }
                    )
                    ->limit(120)
                    ->wrap()
                    ->placeholder('—'),

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