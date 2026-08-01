<?php

namespace App\Filament\Resources\RustyPressKitAboutSections\Pages;

use App\Filament\Resources\RustyPressKitAboutSections\RustyPressKitAboutSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitAboutSection extends EditRecord
{
    protected static string $resource = RustyPressKitAboutSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
