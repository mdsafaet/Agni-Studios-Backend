<?php

namespace App\Filament\Resources\RustyCommunitySlides\Pages;

use App\Filament\Resources\RustyCommunitySlides\RustyCommunitySlideResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyCommunitySlides extends ListRecords
{
    protected static string $resource = RustyCommunitySlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
