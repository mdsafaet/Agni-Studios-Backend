<?php

namespace App\Filament\Resources\RustyRevolverButtons\Pages;

use App\Filament\Resources\RustyRevolverButtons\RustyRevolverButtonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyRevolverButtons extends ListRecords
{
    protected static string $resource = RustyRevolverButtonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
