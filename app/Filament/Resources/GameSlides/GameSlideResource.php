<?php

namespace App\Filament\Resources\GameSlides;

use App\Filament\Resources\GameSlides\Pages\CreateGameSlide;
use App\Filament\Resources\GameSlides\Pages\EditGameSlide;
use App\Filament\Resources\GameSlides\Pages\ListGameSlides;
use App\Filament\Resources\GameSlides\Schemas\GameSlideForm;
use App\Filament\Resources\GameSlides\Tables\GameSlidesTable;
use App\Models\GameSlide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GameSlideResource extends Resource
{
    protected static ?string $model = GameSlide::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return GameSlideForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GameSlidesTable::configure($table);
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
            'index' => ListGameSlides::route('/'),
            'create' => CreateGameSlide::route('/create'),
            'edit' => EditGameSlide::route('/{record}/edit'),
        ];
    }
}
