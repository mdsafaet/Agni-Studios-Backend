<?php

namespace App\Filament\Resources\RustyPressKitAboutSections\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitAboutSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                ImageColumn::make(
                    'cover_image'
                )
                    ->label(
                        'Cover Image'
                    )
                    ->disk('public'),

                TextColumn::make(
                    'paragraph_one'
                )
                    ->label(
                        'First Paragraph'
                    )
                    ->limit(60)
                    ->wrap(),

                TextColumn::make(
                    'paragraph_two'
                )
                    ->label(
                        'Second Paragraph'
                    )
                    ->limit(60)
                    ->wrap(),

                ImageColumn::make(
                    'bottom_icon'
                )
                    ->label(
                        'Bottom Icon'
                    )
                    ->disk('public'),

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