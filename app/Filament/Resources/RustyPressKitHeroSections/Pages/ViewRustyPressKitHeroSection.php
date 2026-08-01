<?php

namespace App\Filament\Resources\RustyPressKitHeroSections\Pages;

use App\Filament\Resources\RustyPressKitHeroSections\RustyPressKitHeroSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitHeroSection extends ViewRecord
{
    protected static string $resource = RustyPressKitHeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
