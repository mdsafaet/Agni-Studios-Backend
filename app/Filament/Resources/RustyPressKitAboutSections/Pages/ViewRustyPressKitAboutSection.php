<?php

namespace App\Filament\Resources\RustyPressKitAboutSections\Pages;

use App\Filament\Resources\RustyPressKitAboutSections\RustyPressKitAboutSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitAboutSection extends ViewRecord
{
    protected static string $resource = RustyPressKitAboutSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
