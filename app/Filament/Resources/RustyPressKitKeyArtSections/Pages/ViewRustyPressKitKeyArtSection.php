<?php

namespace App\Filament\Resources\RustyPressKitKeyArtSections\Pages;

use App\Filament\Resources\RustyPressKitKeyArtSections\RustyPressKitKeyArtSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitKeyArtSection extends ViewRecord
{
    protected static string $resource = RustyPressKitKeyArtSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
