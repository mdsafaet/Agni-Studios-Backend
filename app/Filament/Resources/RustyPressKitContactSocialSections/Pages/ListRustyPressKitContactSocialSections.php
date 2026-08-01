<?php

namespace App\Filament\Resources\RustyPressKitContactSocialSections\Pages;

use App\Filament\Resources\RustyPressKitContactSocialSections\RustyPressKitContactSocialSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitContactSocialSections extends ListRecords
{
    protected static string $resource = RustyPressKitContactSocialSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
