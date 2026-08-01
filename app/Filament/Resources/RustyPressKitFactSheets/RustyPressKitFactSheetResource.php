<?php

namespace App\Filament\Resources\RustyPressKitFactSheets;

use App\Filament\Resources\RustyPressKitFactSheets\Pages\CreateRustyPressKitFactSheet;
use App\Filament\Resources\RustyPressKitFactSheets\Pages\EditRustyPressKitFactSheet;
use App\Filament\Resources\RustyPressKitFactSheets\Pages\ListRustyPressKitFactSheets;
use App\Filament\Resources\RustyPressKitFactSheets\Pages\ViewRustyPressKitFactSheet;
use App\Filament\Resources\RustyPressKitFactSheets\Schemas\RustyPressKitFactSheetForm;
use App\Filament\Resources\RustyPressKitFactSheets\Schemas\RustyPressKitFactSheetInfolist;
use App\Filament\Resources\RustyPressKitFactSheets\Tables\RustyPressKitFactSheetsTable;
use App\Models\RustyPressKitFactSheet;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitFactSheetResource extends Resource
{
    protected static ?string $model =
        RustyPressKitFactSheet::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedListBullet;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Fact Sheet';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        3;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitFactSheetForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitFactSheetInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitFactSheetsTable::configure(
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
                ListRustyPressKitFactSheets::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitFactSheet::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitFactSheet::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitFactSheet::route(
                    '/{record}/edit'
                ),
        ];
    }
}