<?php

namespace App\Filament\Resources\RustyPressKitSections\Pages;

use App\Filament\Resources\RustyPressKitSections\RustyPressKitSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitSection extends EditRecord
{
    protected static string $resource = RustyPressKitSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
