<?php

namespace App\Filament\Resources\RustyPressKitGifSections\Pages;

use App\Filament\Resources\RustyPressKitGifSections\RustyPressKitGifSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitGifSections extends ListRecords
{
    protected static string $resource = RustyPressKitGifSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
