<?php

namespace App\Filament\Resources\RustyPressKitPressReleases\Pages;

use App\Filament\Resources\RustyPressKitPressReleases\RustyPressKitPressReleaseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitPressRelease extends ViewRecord
{
    protected static string $resource = RustyPressKitPressReleaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
