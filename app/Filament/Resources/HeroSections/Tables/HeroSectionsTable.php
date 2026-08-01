<?php

namespace App\Filament\Resources\HeroSections\Tables;

use App\Models\HeroSection;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeroSectionsTable
{
    public static function configure(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('media')
                    ->label('Media')
                    ->formatStateUsing(
                        fn (?string $state): string =>
                            $state ? basename($state) : 'No media'
                    )
                    ->url(
                        fn (HeroSection $record): ?string =>
                            $record->media_url
                    )
                    ->openUrlInNewTab(),

                TextColumn::make('media_type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(
                        fn (string $state): string =>
                            ucfirst($state)
                    ),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->recordActions([
                Action::make('setActive')
                    ->label('Set Active')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(
                        fn (HeroSection $record): bool =>
                            ! $record->is_active
                    )
                    ->requiresConfirmation()
                    ->action(function (HeroSection $record): void {
                        $record->update([
                            'is_active' => true,
                        ]);

                        Notification::make()
                            ->title('Hero media activated')
                            ->success()
                            ->send();
                    }),

                EditAction::make(),

                DeleteAction::make(),
            ])
            ->toolbarActions([])
            ->defaultSort('created_at', 'desc');
    }
}
