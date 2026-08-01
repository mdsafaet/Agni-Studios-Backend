<?php

namespace App\Filament\Resources\GameSlides\Pages;

use App\Filament\Resources\GameSlides\GameSlideResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGameSlide extends EditRecord
{
    protected static string $resource = GameSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
