<?php

namespace App\Filament\Resources\RustyPressKitHeroSections;

use App\Filament\Resources\RustyPressKitHeroSections\Pages\CreateRustyPressKitHeroSection;
use App\Filament\Resources\RustyPressKitHeroSections\Pages\EditRustyPressKitHeroSection;
use App\Filament\Resources\RustyPressKitHeroSections\Pages\ListRustyPressKitHeroSections;
use App\Filament\Resources\RustyPressKitHeroSections\Pages\ViewRustyPressKitHeroSection;
use App\Filament\Resources\RustyPressKitHeroSections\Schemas\RustyPressKitHeroSectionForm;
use App\Filament\Resources\RustyPressKitHeroSections\Schemas\RustyPressKitHeroSectionInfolist;
use App\Filament\Resources\RustyPressKitHeroSections\Tables\RustyPressKitHeroSectionsTable;
use App\Models\RustyPressKitHeroSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitHeroSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitHeroSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedPhoto;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Hero Section';

    protected static ?string $recordTitleAttribute =
        'title';

    protected static ?int $navigationSort =
        1;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitHeroSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitHeroSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitHeroSectionsTable::configure(
            $table
        );
    }

    public static function canCreate(): bool
    {
  return true;
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
                ListRustyPressKitHeroSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitHeroSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitHeroSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitHeroSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}