<?php

namespace App\Filament\Resources\RustyPressKitTrailers\Pages;

use App\Filament\Resources\RustyPressKitTrailers\RustyPressKitTrailerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitTrailers extends ListRecords
{
    protected static string $resource = RustyPressKitTrailerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
