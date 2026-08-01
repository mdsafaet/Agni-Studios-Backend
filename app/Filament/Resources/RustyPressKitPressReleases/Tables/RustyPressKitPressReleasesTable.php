<?php

namespace App\Filament\Resources\RustyPressKitPressReleases\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitPressReleasesTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->defaultSort(
                'sort_order'
            )
            ->columns([
                ImageColumn::make(
                    'image'
                )
                    ->label('Image')
                    ->disk('public'),

                TextColumn::make(
                    'title'
                )
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make(
                    'body'
                )
                    ->label(
                        'Description'
                    )
                    ->limit(70)
                    ->wrap(),

                TextColumn::make(
                    'link'
                )
                    ->label('Link')
                    ->limit(40)
                    ->placeholder('—'),

                TextColumn::make(
                    'sort_order'
                )
                    ->label('Order')
                    ->sortable(),

                IconColumn::make(
                    'is_active'
                )
                    ->label('Active')
                    ->boolean(),

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