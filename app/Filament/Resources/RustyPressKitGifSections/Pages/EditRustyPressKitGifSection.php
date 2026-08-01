<?php

namespace App\Filament\Resources\RustyPressKitGifSections\Pages;

use App\Filament\Resources\RustyPressKitGifSections\RustyPressKitGifSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitGifSection extends EditRecord
{
    protected static string $resource = RustyPressKitGifSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
