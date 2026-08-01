<?php

namespace App\Filament\Resources\RustyPressKitFactSheets\Pages;

use App\Filament\Resources\RustyPressKitFactSheets\RustyPressKitFactSheetResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitFactSheet extends ViewRecord
{
    protected static string $resource = RustyPressKitFactSheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
