<?php

namespace App\Filament\Resources\RustyPressKitPressReleases;

use App\Filament\Resources\RustyPressKitPressReleases\Pages\CreateRustyPressKitPressRelease;
use App\Filament\Resources\RustyPressKitPressReleases\Pages\EditRustyPressKitPressRelease;
use App\Filament\Resources\RustyPressKitPressReleases\Pages\ListRustyPressKitPressReleases;
use App\Filament\Resources\RustyPressKitPressReleases\Pages\ViewRustyPressKitPressRelease;
use App\Filament\Resources\RustyPressKitPressReleases\Schemas\RustyPressKitPressReleaseForm;
use App\Filament\Resources\RustyPressKitPressReleases\Schemas\RustyPressKitPressReleaseInfolist;
use App\Filament\Resources\RustyPressKitPressReleases\Tables\RustyPressKitPressReleasesTable;
use App\Models\RustyPressKitPressRelease;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitPressReleaseResource extends Resource
{
    protected static ?string $model =
        RustyPressKitPressRelease::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedNewspaper;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Press Releases';

    protected static ?string $recordTitleAttribute =
        'title';

    protected static ?int $navigationSort =
        9;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitPressReleaseForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitPressReleaseInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitPressReleasesTable::configure(
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
                ListRustyPressKitPressReleases::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitPressRelease::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitPressRelease::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitPressRelease::route(
                    '/{record}/edit'
                ),
        ];
    }
}