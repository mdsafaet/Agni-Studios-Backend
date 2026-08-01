<?php

namespace App\Filament\Resources\RustyPressKitContactSocialSections\Pages;

use App\Filament\Resources\RustyPressKitContactSocialSections\RustyPressKitContactSocialSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitContactSocialSection extends EditRecord
{
    protected static string $resource = RustyPressKitContactSocialSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
