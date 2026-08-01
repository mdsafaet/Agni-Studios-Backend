<?php

namespace App\Filament\Resources\RustyPressKitKeyArtSections\Pages;

use App\Filament\Resources\RustyPressKitKeyArtSections\RustyPressKitKeyArtSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitKeyArtSections extends ListRecords
{
    protected static string $resource = RustyPressKitKeyArtSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
