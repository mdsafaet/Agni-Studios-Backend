<?php

namespace App\Filament\Resources\RustyCompanionSections;

use App\Filament\Resources\RustyCompanionSections\Pages\CreateRustyCompanionSection;
use App\Filament\Resources\RustyCompanionSections\Pages\EditRustyCompanionSection;
use App\Filament\Resources\RustyCompanionSections\Pages\ListRustyCompanionSections;
use App\Filament\Resources\RustyCompanionSections\Pages\ViewRustyCompanionSection;
use App\Filament\Resources\RustyCompanionSections\Schemas\RustyCompanionSectionForm;
use App\Filament\Resources\RustyCompanionSections\Schemas\RustyCompanionSectionInfolist;
use App\Filament\Resources\RustyCompanionSections\Tables\RustyCompanionSectionsTable;
use App\Models\RustyCompanionSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyCompanionSectionResource extends Resource
{
    protected static ?string $model =
        RustyCompanionSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Revolver';

    protected static ?string $navigationLabel =
        'Companion Section';

    protected static ?string $modelLabel =
        'Companion Section';

    protected static ?string $pluralModelLabel =
        'Companion Sections';

    protected static ?string $recordTitleAttribute =
        'heading';

    protected static ?int $navigationSort =
        4;

    public static function form(Schema $schema): Schema
    {
        return RustyCompanionSectionForm::configure(
            $schema
        );
    }

    public static function infolist(Schema $schema): Schema
    {
        return RustyCompanionSectionInfolist::configure(
            $schema
        );
    }

    public static function table(Table $table): Table
    {
        return RustyCompanionSectionsTable::configure(
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
                ListRustyCompanionSections::route('/'),

            'create' =>
                CreateRustyCompanionSection::route('/create'),

            'view' =>
                ViewRustyCompanionSection::route('/{record}'),

            'edit' =>
                EditRustyCompanionSection::route('/{record}/edit'),
        ];
    }
}