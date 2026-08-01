<?php

namespace App\Filament\Resources\RustyPressKitScreenshotSections\Pages;

use App\Filament\Resources\RustyPressKitScreenshotSections\RustyPressKitScreenshotSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitScreenshotSection extends EditRecord
{
    protected static string $resource = RustyPressKitScreenshotSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
