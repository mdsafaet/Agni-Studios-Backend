<?php

namespace App\Filament\Resources\GameSlides\Pages;

use App\Filament\Resources\GameSlides\GameSlideResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGameSlides extends ListRecords
{
    protected static string $resource = GameSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
