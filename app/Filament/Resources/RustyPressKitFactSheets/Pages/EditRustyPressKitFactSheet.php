<?php

namespace App\Filament\Resources\RustyPressKitFactSheets\Pages;

use App\Filament\Resources\RustyPressKitFactSheets\RustyPressKitFactSheetResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitFactSheet extends EditRecord
{
    protected static string $resource = RustyPressKitFactSheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
