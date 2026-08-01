<?php

namespace App\Filament\Resources\RustyTrailerSections\Pages;

use App\Filament\Resources\RustyTrailerSections\RustyTrailerSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyTrailerSections extends ListRecords
{
    protected static string $resource = RustyTrailerSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
