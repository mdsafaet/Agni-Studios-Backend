<?php

namespace App\Filament\Resources\RustyPressKitScreenshotSections\Pages;

use App\Filament\Resources\RustyPressKitScreenshotSections\RustyPressKitScreenshotSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitScreenshotSections extends ListRecords
{
    protected static string $resource = RustyPressKitScreenshotSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
