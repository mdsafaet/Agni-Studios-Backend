<?php

namespace App\Filament\Resources\RustyPressKitKeyArtSections\Pages;

use App\Filament\Resources\RustyPressKitKeyArtSections\RustyPressKitKeyArtSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitKeyArtSection extends EditRecord
{
    protected static string $resource = RustyPressKitKeyArtSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
