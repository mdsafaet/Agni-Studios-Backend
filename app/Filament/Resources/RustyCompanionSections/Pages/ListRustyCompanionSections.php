<?php

namespace App\Filament\Resources\RustyCompanionSections\Pages;

use App\Filament\Resources\RustyCompanionSections\RustyCompanionSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyCompanionSections extends ListRecords
{
    protected static string $resource = RustyCompanionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
