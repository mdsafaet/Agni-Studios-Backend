<?php

namespace App\Filament\Resources\RustyPressKitDescriptionSections\Pages;

use App\Filament\Resources\RustyPressKitDescriptionSections\RustyPressKitDescriptionSectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRustyPressKitDescriptionSection extends ViewRecord
{
    protected static string $resource = RustyPressKitDescriptionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
