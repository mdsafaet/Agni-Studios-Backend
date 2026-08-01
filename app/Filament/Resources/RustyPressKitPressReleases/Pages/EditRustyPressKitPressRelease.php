<?php

namespace App\Filament\Resources\RustyPressKitPressReleases\Pages;

use App\Filament\Resources\RustyPressKitPressReleases\RustyPressKitPressReleaseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitPressRelease extends EditRecord
{
    protected static string $resource = RustyPressKitPressReleaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
