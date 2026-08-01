<?php

namespace App\Filament\Resources\RustyTrailerSections;

use App\Filament\Resources\RustyTrailerSections\Pages\CreateRustyTrailerSection;
use App\Filament\Resources\RustyTrailerSections\Pages\EditRustyTrailerSection;
use App\Filament\Resources\RustyTrailerSections\Pages\ListRustyTrailerSections;
use App\Filament\Resources\RustyTrailerSections\Pages\ViewRustyTrailerSection;
use App\Filament\Resources\RustyTrailerSections\Schemas\RustyTrailerSectionForm;
use App\Filament\Resources\RustyTrailerSections\Schemas\RustyTrailerSectionInfolist;
use App\Filament\Resources\RustyTrailerSections\Tables\RustyTrailerSectionsTable;
use App\Models\RustyTrailerSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

// Add this import.
use UnitEnum;

class RustyTrailerSectionResource extends Resource
{
    protected static ?string $model =
        RustyTrailerSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;



    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Revolver';

    protected static ?string $navigationLabel =
        'Trailer Section';

    protected static ?int $navigationSort =
        5;



    protected static ?string $recordTitleAttribute =
        'heading';

    public static function form(Schema $schema): Schema
    {
        return RustyTrailerSectionForm::configure(
            $schema
        );
    }

    public static function infolist(Schema $schema): Schema
    {
        return RustyTrailerSectionInfolist::configure(
            $schema
        );
    }

    public static function table(Table $table): Table
    {
        return RustyTrailerSectionsTable::configure(
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
                ListRustyTrailerSections::route('/'),

            'create' =>
                CreateRustyTrailerSection::route('/create'),

            'view' =>
                ViewRustyTrailerSection::route('/{record}'),

            'edit' =>
                EditRustyTrailerSection::route('/{record}/edit'),
        ];
    }
}