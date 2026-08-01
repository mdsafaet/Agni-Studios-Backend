<?php

namespace App\Filament\Resources\RustyPressKitDescriptionSections\Pages;

use App\Filament\Resources\RustyPressKitDescriptionSections\RustyPressKitDescriptionSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRustyPressKitDescriptionSections extends ListRecords
{
    protected static string $resource = RustyPressKitDescriptionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
