<?php

namespace App\Filament\Resources\RustyCommunitySlides\Pages;

use App\Filament\Resources\RustyCommunitySlides\RustyCommunitySlideResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyCommunitySlide extends ViewRecord
{
    protected static string $resource = RustyCommunitySlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
