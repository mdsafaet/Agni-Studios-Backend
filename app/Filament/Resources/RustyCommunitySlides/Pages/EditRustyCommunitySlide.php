<?php

namespace App\Filament\Resources\RustyCommunitySlides\Pages;

use App\Filament\Resources\RustyCommunitySlides\RustyCommunitySlideResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyCommunitySlide extends EditRecord
{
    protected static string $resource = RustyCommunitySlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
