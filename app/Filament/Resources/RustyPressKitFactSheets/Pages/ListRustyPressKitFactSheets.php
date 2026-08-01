<?php

namespace App\Filament\Resources\RustyPressKitFactSheets\Pages;

use App\Filament\Resources\RustyPressKitFactSheets\RustyPressKitFactSheetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitFactSheets extends ListRecords
{
    protected static string $resource = RustyPressKitFactSheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
