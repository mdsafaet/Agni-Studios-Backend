<?php

namespace App\Filament\Resources\RustyBeatSlides\Pages;

use App\Filament\Resources\RustyBeatSlides\RustyBeatSlideResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyBeatSlide extends ViewRecord
{
    protected static string $resource = RustyBeatSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
