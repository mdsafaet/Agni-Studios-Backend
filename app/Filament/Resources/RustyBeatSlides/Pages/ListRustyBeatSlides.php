<?php

namespace App\Filament\Resources\RustyBeatSlides\Pages;

use App\Filament\Resources\RustyBeatSlides\RustyBeatSlideResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyBeatSlides extends ListRecords
{
    protected static string $resource = RustyBeatSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
