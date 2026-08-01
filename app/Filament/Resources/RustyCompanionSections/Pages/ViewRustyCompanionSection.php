<?php

namespace App\Filament\Resources\RustyCompanionSections\Pages;

use App\Filament\Resources\RustyCompanionSections\RustyCompanionSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyCompanionSection extends ViewRecord
{
    protected static string $resource = RustyCompanionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
