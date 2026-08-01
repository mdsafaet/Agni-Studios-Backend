<?php

namespace App\Filament\Resources\FooterIcons\Pages;

use App\Filament\Resources\FooterIcons\FooterIconResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFooterIcon extends EditRecord
{
    protected static string $resource = FooterIconResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
