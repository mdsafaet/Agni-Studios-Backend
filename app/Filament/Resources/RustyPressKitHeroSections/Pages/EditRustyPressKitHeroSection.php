<?php

namespace App\Filament\Resources\RustyPressKitHeroSections\Pages;

use App\Filament\Resources\RustyPressKitHeroSections\RustyPressKitHeroSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitHeroSection extends EditRecord
{
    protected static string $resource = RustyPressKitHeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
