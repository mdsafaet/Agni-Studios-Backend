<?php

namespace App\Filament\Resources\RustyPressKitGifSections\Tables;

use App\Models\RustyPressKitGifSection;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitGifSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                TextColumn::make(
                    'gif_count'
                )
                    ->label(
                        'Total GIFs'
                    )
                    ->getStateUsing(
                        fn (
                            RustyPressKitGifSection $record
                        ): int =>
                            collect(
                                $record->gifs ?? []
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