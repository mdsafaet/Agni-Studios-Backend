<?php

namespace App\Filament\Resources\RustyPressKitTrailers;

use App\Filament\Resources\RustyPressKitTrailers\Pages\CreateRustyPressKitTrailer;
use App\Filament\Resources\RustyPressKitTrailers\Pages\EditRustyPressKitTrailer;
use App\Filament\Resources\RustyPressKitTrailers\Pages\ListRustyPressKitTrailers;
use App\Filament\Resources\RustyPressKitTrailers\Schemas\RustyPressKitTrailerForm;
use App\Filament\Resources\RustyPressKitTrailers\Tables\RustyPressKitTrailersTable;
use App\Models\RustyPressKitTrailer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyPressKitTrailerResource extends Resource
{
    protected static ?string $model = RustyPressKitTrailer::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedVideoCamera;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Press Kit';

    protected static ?string $navigationLabel =
        'Trailers';

    protected static ?string $recordTitleAttribute =
        'title';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return RustyPressKitTrailerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RustyPressKitTrailersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRustyPressKitTrailers::route('/'),
            'create' => CreateRustyPressKitTrailer::route('/create'),
            'edit' => EditRustyPressKitTrailer::route('/{record}/edit'),
        ];
    }
}