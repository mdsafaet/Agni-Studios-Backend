<?php

namespace App\Filament\Resources\RustyPressKitTrailers\Pages;

use App\Filament\Resources\RustyPressKitTrailers\RustyPressKitTrailerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitTrailer extends EditRecord
{
    protected static string $resource = RustyPressKitTrailerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
