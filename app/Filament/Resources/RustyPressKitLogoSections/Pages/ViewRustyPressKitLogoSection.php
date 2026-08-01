<?php

namespace App\Filament\Resources\RustyPressKitLogoSections\Pages;

use App\Filament\Resources\RustyPressKitLogoSections\RustyPressKitLogoSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitLogoSection extends ViewRecord
{
    protected static string $resource = RustyPressKitLogoSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
