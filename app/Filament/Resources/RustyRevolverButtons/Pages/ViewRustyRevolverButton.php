<?php

namespace App\Filament\Resources\RustyRevolverButtons\Pages;

use App\Filament\Resources\RustyRevolverButtons\RustyRevolverButtonResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyRevolverButton extends ViewRecord
{
    protected static string $resource = RustyRevolverButtonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
