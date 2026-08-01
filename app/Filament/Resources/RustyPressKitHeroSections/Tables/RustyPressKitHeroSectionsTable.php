<?php

namespace App\Filament\Resources\RustyPressKitHeroSections\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitHeroSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                ImageColumn::make(
                    'hero_image'
                )
                    ->label(
                        'Hero Image'
                    )
                    ->disk('public'),

                TextColumn::make(
                    'title'
                )
                    ->label('Title')
                    ->searchable()
                    ->wrap(),

                TextColumn::make(
                    'subtitle'
                )
                    ->label('Subtitle'),

                TextColumn::make(
                    'button_text'
                )
                    ->label(
                        'Button Text'
                    ),

                TextColumn::make(
                    'icon_type'
                )
                    ->label(
                        'Icon Type'
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