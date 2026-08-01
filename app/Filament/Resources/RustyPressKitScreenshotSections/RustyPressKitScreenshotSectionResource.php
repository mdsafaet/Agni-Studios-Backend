<?php

namespace App\Filament\Resources\RustyPressKitScreenshotSections;

use App\Filament\Resources\RustyPressKitScreenshotSections\Pages\CreateRustyPressKitScreenshotSection;
use App\Filament\Resources\RustyPressKitScreenshotSections\Pages\EditRustyPressKitScreenshotSection;
use App\Filament\Resources\RustyPressKitScreenshotSections\Pages\ListRustyPressKitScreenshotSections;
use App\Filament\Resources\RustyPressKitScreenshotSections\Pages\ViewRustyPressKitScreenshotSection;
use App\Filament\Resources\RustyPressKitScreenshotSections\Schemas\RustyPressKitScreenshotSectionForm;
use App\Filament\Resources\RustyPressKitScreenshotSections\Schemas\RustyPressKitScreenshotSectionInfolist;
use App\Filament\Resources\RustyPressKitScreenshotSections\Tables\RustyPressKitScreenshotSectionsTable;
use App\Models\RustyPressKitScreenshotSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitScreenshotSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitScreenshotSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedPhoto;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Screenshots';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        7;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitScreenshotSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitScreenshotSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitScreenshotSectionsTable::configure(
            $table
        );
    }

//  public static function canCreate(): bool
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
                ListRustyPressKitScreenshotSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitScreenshotSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitScreenshotSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitScreenshotSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}