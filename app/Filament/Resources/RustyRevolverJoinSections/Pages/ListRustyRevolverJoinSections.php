<?php

namespace App\Filament\Resources\RustyRevolverJoinSections\Pages;

use App\Filament\Resources\RustyRevolverJoinSections\RustyRevolverJoinSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyRevolverJoinSections extends ListRecords
{
    protected static string $resource = RustyRevolverJoinSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
