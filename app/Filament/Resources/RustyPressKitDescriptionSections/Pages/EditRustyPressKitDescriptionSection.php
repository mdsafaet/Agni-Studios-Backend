<?php

namespace App\Filament\Resources\RustyPressKitDescriptionSections\Pages;

use App\Filament\Resources\RustyPressKitDescriptionSections\RustyPressKitDescriptionSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRustyPressKitDescriptionSection extends EditRecord
{
    protected static string $resource = RustyPressKitDescriptionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
