<?php

namespace App\Filament\Resources\RustyPressKitGifSections\Pages;

use App\Filament\Resources\RustyPressKitGifSections\RustyPressKitGifSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitGifSection extends ViewRecord
{
    protected static string $resource = RustyPressKitGifSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
