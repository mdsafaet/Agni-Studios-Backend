<?php

namespace App\Filament\Resources\RustyPressKitHeroSections\Pages;

use App\Filament\Resources\RustyPressKitHeroSections\RustyPressKitHeroSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitHeroSections extends ListRecords
{
    protected static string $resource = RustyPressKitHeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
