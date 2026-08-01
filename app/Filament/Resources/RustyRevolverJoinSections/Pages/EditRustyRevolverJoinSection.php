<?php

namespace App\Filament\Resources\RustyRevolverJoinSections\Pages;

use App\Filament\Resources\RustyRevolverJoinSections\RustyRevolverJoinSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyRevolverJoinSection extends EditRecord
{
    protected static string $resource = RustyRevolverJoinSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
