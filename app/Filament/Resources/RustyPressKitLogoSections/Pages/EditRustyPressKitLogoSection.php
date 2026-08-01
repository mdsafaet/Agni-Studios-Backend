<?php

namespace App\Filament\Resources\RustyPressKitLogoSections\Pages;

use App\Filament\Resources\RustyPressKitLogoSections\RustyPressKitLogoSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitLogoSection extends EditRecord
{
    protected static string $resource = RustyPressKitLogoSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
