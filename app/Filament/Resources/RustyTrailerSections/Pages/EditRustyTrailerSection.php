<?php

namespace App\Filament\Resources\RustyTrailerSections\Pages;

use App\Filament\Resources\RustyTrailerSections\RustyTrailerSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyTrailerSection extends EditRecord
{
    protected static string $resource = RustyTrailerSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
