<?php

namespace App\Filament\Resources\RustyRevolverButtons\Pages;

use App\Filament\Resources\RustyRevolverButtons\RustyRevolverButtonResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyRevolverButton extends EditRecord
{
    protected static string $resource = RustyRevolverButtonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
