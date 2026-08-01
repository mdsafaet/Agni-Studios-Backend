<?php

namespace App\Filament\Resources\RustyPressKitScreenshotSections\Pages;

use App\Filament\Resources\RustyPressKitScreenshotSections\RustyPressKitScreenshotSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitScreenshotSection extends ViewRecord
{
    protected static string $resource = RustyPressKitScreenshotSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
