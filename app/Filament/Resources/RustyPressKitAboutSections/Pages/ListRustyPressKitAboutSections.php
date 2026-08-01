<?php

namespace App\Filament\Resources\RustyPressKitAboutSections\Pages;

use App\Filament\Resources\RustyPressKitAboutSections\RustyPressKitAboutSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitAboutSections extends ListRecords
{
    protected static string $resource = RustyPressKitAboutSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
