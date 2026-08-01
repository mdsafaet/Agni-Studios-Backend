<?php

namespace App\Filament\Resources\RustyPressKitLogoSections;

use App\Filament\Resources\RustyPressKitLogoSections\Pages\CreateRustyPressKitLogoSection;
use App\Filament\Resources\RustyPressKitLogoSections\Pages\EditRustyPressKitLogoSection;
use App\Filament\Resources\RustyPressKitLogoSections\Pages\ListRustyPressKitLogoSections;
use App\Filament\Resources\RustyPressKitLogoSections\Pages\ViewRustyPressKitLogoSection;
use App\Filament\Resources\RustyPressKitLogoSections\Schemas\RustyPressKitLogoSectionForm;
use App\Filament\Resources\RustyPressKitLogoSections\Schemas\RustyPressKitLogoSectionInfolist;
use App\Filament\Resources\RustyPressKitLogoSections\Tables\RustyPressKitLogoSectionsTable;
use App\Models\RustyPressKitLogoSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitLogoSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitLogoSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedPhoto;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Logos';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        5;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitLogoSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitLogoSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitLogoSectionsTable::configure(
            $table
        );
    }

    // public static function canCreate(): bool
    // {
    //     return ! static::getModel()::query()
    //         ->exists();
    // }

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
                ListRustyPressKitLogoSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitLogoSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitLogoSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitLogoSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}