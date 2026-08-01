<?php

namespace App\Filament\Resources\RustyTrailerSections\Pages;

use App\Filament\Resources\RustyTrailerSections\RustyTrailerSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyTrailerSection extends ViewRecord
{
    protected static string $resource = RustyTrailerSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
