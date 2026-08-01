<?php

namespace App\Filament\Resources\RustyPressKitContactSocialSections\Tables;

use App\Models\RustyPressKitContactSocialSection;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RustyPressKitContactSocialSectionsTable
{
    public static function configure(
        Table $table
    ): Table {
        return $table
            ->columns([
                TextColumn::make(
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
                                ->filter(
                                    fn (
                                        mixed $item
                                    ): bool =>
                                        is_array(
                                            $item
                                        ) &&
                                        (
                                            $item[
                                                'is_active'
                                            ] ?? true
                                        )
                                )
                                ->pluck(
                                    'label'
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