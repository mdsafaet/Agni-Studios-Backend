<?php

namespace App\Filament\Resources\RustyRevolverJoinSections\Pages;

use App\Filament\Resources\RustyRevolverJoinSections\RustyRevolverJoinSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyRevolverJoinSection extends ViewRecord
{
    protected static string $resource = RustyRevolverJoinSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
