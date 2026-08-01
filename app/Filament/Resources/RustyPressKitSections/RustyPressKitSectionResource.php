<?php

namespace App\Filament\Resources\RustyPressKitSections;

use App\Filament\Resources\RustyPressKitSections\Pages\CreateRustyPressKitSection;
use App\Filament\Resources\RustyPressKitSections\Pages\EditRustyPressKitSection;
use App\Filament\Resources\RustyPressKitSections\Pages\ListRustyPressKitSections;
use App\Filament\Resources\RustyPressKitSections\Pages\ViewRustyPressKitSection;
use App\Filament\Resources\RustyPressKitSections\Schemas\RustyPressKitSectionForm;
use App\Filament\Resources\RustyPressKitSections\Schemas\RustyPressKitSectionInfolist;
use App\Filament\Resources\RustyPressKitSections\Tables\RustyPressKitSectionsTable;
use App\Models\RustyPressKitSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    /*
    |--------------------------------------------------------------------------
    | Rusty Revolver navigation group
    |--------------------------------------------------------------------------
    */

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Revolver';

    protected static ?string $navigationLabel =
        'Press Kit Section';

    protected static ?string $recordTitleAttribute =
        'heading';

    protected static ?int $navigationSort =
        6;

    public static function form(Schema $schema): Schema
    {
        return RustyPressKitSectionForm::configure(
            $schema
        );
    }

    public static function infolist(Schema $schema): Schema
    {
        return RustyPressKitSectionInfolist::configure(
            $schema
        );
    }

    public static function table(Table $table): Table
    {
        return RustyPressKitSectionsTable::configure(
            $table
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Only allow one Press Kit section record
    |--------------------------------------------------------------------------
    */

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
                ListRustyPressKitSections::route('/'),

            'create' =>
                CreateRustyPressKitSection::route('/create'),

            'view' =>
                ViewRustyPressKitSection::route('/{record}'),

            'edit' =>
                EditRustyPressKitSection::route('/{record}/edit'),
        ];
    }
}