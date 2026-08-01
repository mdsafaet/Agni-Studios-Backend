<?php

namespace App\Filament\Resources\RustyPressKitAboutSections;

use App\Filament\Resources\RustyPressKitAboutSections\Pages\CreateRustyPressKitAboutSection;
use App\Filament\Resources\RustyPressKitAboutSections\Pages\EditRustyPressKitAboutSection;
use App\Filament\Resources\RustyPressKitAboutSections\Pages\ListRustyPressKitAboutSections;
use App\Filament\Resources\RustyPressKitAboutSections\Pages\ViewRustyPressKitAboutSection;
use App\Filament\Resources\RustyPressKitAboutSections\Schemas\RustyPressKitAboutSectionForm;
use App\Filament\Resources\RustyPressKitAboutSections\Schemas\RustyPressKitAboutSectionInfolist;
use App\Filament\Resources\RustyPressKitAboutSections\Tables\RustyPressKitAboutSectionsTable;
use App\Models\RustyPressKitAboutSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitAboutSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitAboutSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'About the Game';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        2;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitAboutSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitAboutSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitAboutSectionsTable::configure(
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
                ListRustyPressKitAboutSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitAboutSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitAboutSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitAboutSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}