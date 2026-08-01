<?php

namespace App\Filament\Resources\RustyRevolverJoinSections;

use App\Filament\Resources\RustyRevolverJoinSections\Pages\CreateRustyRevolverJoinSection;
use App\Filament\Resources\RustyRevolverJoinSections\Pages\EditRustyRevolverJoinSection;
use App\Filament\Resources\RustyRevolverJoinSections\Pages\ListRustyRevolverJoinSections;
use App\Filament\Resources\RustyRevolverJoinSections\Pages\ViewRustyRevolverJoinSection;
use App\Filament\Resources\RustyRevolverJoinSections\Schemas\RustyRevolverJoinSectionForm;
use App\Filament\Resources\RustyRevolverJoinSections\Schemas\RustyRevolverJoinSectionInfolist;
use App\Filament\Resources\RustyRevolverJoinSections\Tables\RustyRevolverJoinSectionsTable;
use App\Models\RustyRevolverJoinSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyRevolverJoinSectionResource extends Resource
{
    protected static ?string $model =
        RustyRevolverJoinSection::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Revolver';

    protected static ?string $navigationLabel =
        'Join Section';

    protected static ?string $modelLabel =
        'Join Section';

    protected static ?string $pluralModelLabel =
        'Join Sections';

    protected static ?string $recordTitleAttribute =
        'heading';

    protected static ?int $navigationSort =
        2;

    public static function form(Schema $schema): Schema
    {
        return RustyRevolverJoinSectionForm::configure(
            $schema
        );
    }

    public static function infolist(Schema $schema): Schema
    {
        return RustyRevolverJoinSectionInfolist::configure(
            $schema
        );
    }

    public static function table(Table $table): Table
    {
        return RustyRevolverJoinSectionsTable::configure(
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
                ListRustyRevolverJoinSections::route('/'),

            'create' =>
                CreateRustyRevolverJoinSection::route('/create'),

            'view' =>
                ViewRustyRevolverJoinSection::route('/{record}'),

            'edit' =>
                EditRustyRevolverJoinSection::route('/{record}/edit'),
        ];
    }
}