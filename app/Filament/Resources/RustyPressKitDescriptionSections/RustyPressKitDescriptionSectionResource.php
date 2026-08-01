<?php

namespace App\Filament\Resources\RustyPressKitDescriptionSections;

use App\Filament\Resources\RustyPressKitDescriptionSections\Pages\CreateRustyPressKitDescriptionSection;
use App\Filament\Resources\RustyPressKitDescriptionSections\Pages\EditRustyPressKitDescriptionSection;
use App\Filament\Resources\RustyPressKitDescriptionSections\Pages\ListRustyPressKitDescriptionSections;
use App\Filament\Resources\RustyPressKitDescriptionSections\Pages\ViewRustyPressKitDescriptionSection;
use App\Filament\Resources\RustyPressKitDescriptionSections\Schemas\RustyPressKitDescriptionSectionForm;
use App\Filament\Resources\RustyPressKitDescriptionSections\Schemas\RustyPressKitDescriptionSectionInfolist;
use App\Filament\Resources\RustyPressKitDescriptionSections\Tables\RustyPressKitDescriptionSectionsTable;
use App\Models\RustyPressKitDescriptionSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitDescriptionSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitDescriptionSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Description';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        3;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitDescriptionSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitDescriptionSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitDescriptionSectionsTable::configure(
            $table
        );
    }

    public static function canCreate(): bool
    {
        return ! static::getModel()::query()
            ->exists();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' =>
                ListRustyPressKitDescriptionSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitDescriptionSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitDescriptionSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitDescriptionSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}