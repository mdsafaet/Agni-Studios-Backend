<?php

namespace App\Filament\Resources\RustyPressKitSections\Pages;

use App\Filament\Resources\RustyPressKitSections\RustyPressKitSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitSection extends ViewRecord
{
    protected static string $resource = RustyPressKitSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
