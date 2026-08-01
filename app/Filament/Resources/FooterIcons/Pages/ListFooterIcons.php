<?php

namespace App\Filament\Resources\FooterIcons\Pages;

use App\Filament\Resources\FooterIcons\FooterIconResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFooterIcons extends ListRecords
{
    protected static string $resource = FooterIconResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
