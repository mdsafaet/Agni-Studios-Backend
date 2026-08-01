<?php

namespace App\Filament\Resources\RustyPressKitPressReleases\Pages;

use App\Filament\Resources\RustyPressKitPressReleases\RustyPressKitPressReleaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitPressReleases extends ListRecords
{
    protected static string $resource = RustyPressKitPressReleaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
