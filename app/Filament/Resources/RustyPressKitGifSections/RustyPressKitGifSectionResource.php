<?php

namespace App\Filament\Resources\RustyPressKitGifSections;

use App\Filament\Resources\RustyPressKitGifSections\Pages\CreateRustyPressKitGifSection;
use App\Filament\Resources\RustyPressKitGifSections\Pages\EditRustyPressKitGifSection;
use App\Filament\Resources\RustyPressKitGifSections\Pages\ListRustyPressKitGifSections;
use App\Filament\Resources\RustyPressKitGifSections\Pages\ViewRustyPressKitGifSection;
use App\Filament\Resources\RustyPressKitGifSections\Schemas\RustyPressKitGifSectionForm;
use App\Filament\Resources\RustyPressKitGifSections\Schemas\RustyPressKitGifSectionInfolist;
use App\Filament\Resources\RustyPressKitGifSections\Tables\RustyPressKitGifSectionsTable;
use App\Models\RustyPressKitGifSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitGifSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitGifSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedFilm;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'GIFs';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        8;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitGifSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitGifSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitGifSectionsTable::configure(
            $table
        );
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
                ListRustyPressKitGifSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitGifSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitGifSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitGifSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}