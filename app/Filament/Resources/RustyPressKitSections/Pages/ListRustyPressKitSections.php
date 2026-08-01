<?php

namespace App\Filament\Resources\RustyPressKitSections\Pages;

use App\Filament\Resources\RustyPressKitSections\RustyPressKitSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitSections extends ListRecords
{
    protected static string $resource = RustyPressKitSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
