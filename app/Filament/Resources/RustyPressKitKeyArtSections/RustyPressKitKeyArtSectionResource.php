<?php

namespace App\Filament\Resources\RustyPressKitKeyArtSections;

use App\Filament\Resources\RustyPressKitKeyArtSections\Pages\CreateRustyPressKitKeyArtSection;
use App\Filament\Resources\RustyPressKitKeyArtSections\Pages\EditRustyPressKitKeyArtSection;
use App\Filament\Resources\RustyPressKitKeyArtSections\Pages\ListRustyPressKitKeyArtSections;
use App\Filament\Resources\RustyPressKitKeyArtSections\Pages\ViewRustyPressKitKeyArtSection;
use App\Filament\Resources\RustyPressKitKeyArtSections\Schemas\RustyPressKitKeyArtSectionForm;
use App\Filament\Resources\RustyPressKitKeyArtSections\Schemas\RustyPressKitKeyArtSectionInfolist;
use App\Filament\Resources\RustyPressKitKeyArtSections\Tables\RustyPressKitKeyArtSectionsTable;
use App\Models\RustyPressKitKeyArtSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitKeyArtSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitKeyArtSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedPhoto;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Key Art';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        6;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitKeyArtSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitKeyArtSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitKeyArtSectionsTable::configure(
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
                ListRustyPressKitKeyArtSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitKeyArtSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitKeyArtSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitKeyArtSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}