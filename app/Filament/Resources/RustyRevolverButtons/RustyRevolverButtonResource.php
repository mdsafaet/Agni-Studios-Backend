<?php

namespace App\Filament\Resources\RustyRevolverButtons;

use App\Filament\Resources\RustyRevolverButtons\Pages\CreateRustyRevolverButton;
use App\Filament\Resources\RustyRevolverButtons\Pages\EditRustyRevolverButton;
use App\Filament\Resources\RustyRevolverButtons\Pages\ListRustyRevolverButtons;
use App\Filament\Resources\RustyRevolverButtons\Pages\ViewRustyRevolverButton;
use App\Filament\Resources\RustyRevolverButtons\Schemas\RustyRevolverButtonForm;
use App\Filament\Resources\RustyRevolverButtons\Schemas\RustyRevolverButtonInfolist;
use App\Filament\Resources\RustyRevolverButtons\Tables\RustyRevolverButtonsTable;
use App\Models\RustyRevolverButton;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyRevolverButtonResource extends Resource
{
    protected static ?string $model =
        RustyRevolverButton::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedCursorArrowRays;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Revolver';

    protected static ?string $navigationLabel =
        'Hero Buttons';

    protected static ?string $recordTitleAttribute =
        'text';

    protected static ?int $navigationSort =
        1;

    public static function form(Schema $schema): Schema
    {
        return RustyRevolverButtonForm::configure(
            $schema
        );
    }

    public static function infolist(Schema $schema): Schema
    {
        return RustyRevolverButtonInfolist::configure(
            $schema
        );
    }

    public static function table(Table $table): Table
    {
        return RustyRevolverButtonsTable::configure(
            $table
        );
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' =>
                ListRustyRevolverButtons::route('/'),

            'create' =>
                CreateRustyRevolverButton::route('/create'),

            'view' =>
                ViewRustyRevolverButton::route('/{record}'),

            'edit' =>
                EditRustyRevolverButton::route('/{record}/edit'),
        ];
    }
}