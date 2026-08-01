<?php

namespace App\Filament\Resources\RustyPressKitScreenshotSections\Tables;

use App\Models\RustyPressKitScreenshotSection;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitScreenshotSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                TextColumn::make(
                    'screenshot_count'
                )
                    ->label(
                        'Total Screenshots'
                    )
                    ->getStateUsing(
                        fn (
                            RustyPressKitScreenshotSection $record
                        ): int =>
                            collect(
                                $record->screenshots ?? []
                            )
                                ->filter()
                                ->count()
                    )
                    ->badge(),

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