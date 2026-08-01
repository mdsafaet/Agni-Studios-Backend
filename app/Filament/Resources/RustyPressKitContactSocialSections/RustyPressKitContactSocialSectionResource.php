<?php

namespace App\Filament\Resources\RustyPressKitContactSocialSections;

use App\Filament\Resources\RustyPressKitContactSocialSections\Pages\CreateRustyPressKitContactSocialSection;
use App\Filament\Resources\RustyPressKitContactSocialSections\Pages\EditRustyPressKitContactSocialSection;
use App\Filament\Resources\RustyPressKitContactSocialSections\Pages\ListRustyPressKitContactSocialSections;
use App\Filament\Resources\RustyPressKitContactSocialSections\Pages\ViewRustyPressKitContactSocialSection;
use App\Filament\Resources\RustyPressKitContactSocialSections\Schemas\RustyPressKitContactSocialSectionForm;
use App\Filament\Resources\RustyPressKitContactSocialSections\Schemas\RustyPressKitContactSocialSectionInfolist;
use App\Filament\Resources\RustyPressKitContactSocialSections\Tables\RustyPressKitContactSocialSectionsTable;
use App\Models\RustyPressKitContactSocialSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitContactSocialSectionResource extends Resource
{
    protected static ?string $model =
        RustyPressKitContactSocialSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedShare;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Contact Social Media';

    protected static ?string $recordTitleAttribute =
        'id';

    protected static ?int $navigationSort =
        10;

    public static function form(
        Schema $schema
    ): Schema {
        return RustyPressKitContactSocialSectionForm::configure(
            $schema
        );
    }

    public static function infolist(
        Schema $schema
    ): Schema {
        return RustyPressKitContactSocialSectionInfolist::configure(
            $schema
        );
    }

    public static function table(
        Table $table
    ): Table {
        return RustyPressKitContactSocialSectionsTable::configure(
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
                ListRustyPressKitContactSocialSections::route(
                    '/'
                ),

            'create' =>
                CreateRustyPressKitContactSocialSection::route(
                    '/create'
                ),

            'view' =>
                ViewRustyPressKitContactSocialSection::route(
                    '/{record}'
                ),

            'edit' =>
                EditRustyPressKitContactSocialSection::route(
                    '/{record}/edit'
                ),
        ];
    }
}