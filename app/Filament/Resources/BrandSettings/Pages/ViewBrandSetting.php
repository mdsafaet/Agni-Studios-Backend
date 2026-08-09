<?php

namespace App\Filament\Resources\BrandSettings\Pages;

use App\Filament\Resources\BrandSettings\BrandSettingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBrandSetting extends ViewRecord
{
    protected static string $resource = BrandSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
