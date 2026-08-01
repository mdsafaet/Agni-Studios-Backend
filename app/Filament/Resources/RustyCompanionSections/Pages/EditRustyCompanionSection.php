<?php

namespace App\Filament\Resources\RustyCompanionSections\Pages;

use App\Filament\Resources\RustyCompanionSections\RustyCompanionSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyCompanionSection extends EditRecord
{
    protected static string $resource = RustyCompanionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
