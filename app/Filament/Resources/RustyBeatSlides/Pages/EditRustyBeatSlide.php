<?php

namespace App\Filament\Resources\RustyBeatSlides\Pages;

use App\Filament\Resources\RustyBeatSlides\RustyBeatSlideResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyBeatSlide extends EditRecord
{
    protected static string $resource = RustyBeatSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
