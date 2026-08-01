<?php

namespace App\Filament\Resources\RustyPressKitLogoSections\Pages;

use App\Filament\Resources\RustyPressKitLogoSections\RustyPressKitLogoSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitLogoSections extends ListRecords
{
    protected static string $resource = RustyPressKitLogoSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
