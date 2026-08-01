<?php

namespace App\Filament\Resources\RustyBeatSlides;

use App\Filament\Resources\RustyBeatSlides\Pages\CreateRustyBeatSlide;
use App\Filament\Resources\RustyBeatSlides\Pages\EditRustyBeatSlide;
use App\Filament\Resources\RustyBeatSlides\Pages\ListRustyBeatSlides;
use App\Filament\Resources\RustyBeatSlides\Pages\ViewRustyBeatSlide;
use App\Filament\Resources\RustyBeatSlides\Schemas\RustyBeatSlideForm;
use App\Filament\Resources\RustyBeatSlides\Schemas\RustyBeatSlideInfolist;
use App\Filament\Resources\RustyBeatSlides\Tables\RustyBeatSlidesTable;
use App\Models\RustyBeatSlide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyBeatSlideResource extends Resource
{
    protected static ?string $model =
        RustyBeatSlide::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Revolver';

    protected static ?string $navigationLabel =
        'Beat Carousel';

    protected static ?string $modelLabel =
        'Beat Slide';

    protected static ?string $pluralModelLabel =
        'Beat Slides';

    protected static ?string $recordTitleAttribute =
        'heading';

    protected static ?int $navigationSort =
        3;

    public static function form(Schema $schema): Schema
    {
        return RustyBeatSlideForm::configure(
            $schema
        );
    }

    public static function infolist(Schema $schema): Schema
    {
        return RustyBeatSlideInfolist::configure(
            $schema
        );
    }

    public static function table(Table $table): Table
    {
        return RustyBeatSlidesTable::configure(
            $table
        );
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
                ListRustyBeatSlides::route('/'),

            'create' =>
                CreateRustyBeatSlide::route('/create'),

            'view' =>
                ViewRustyBeatSlide::route('/{record}'),

            'edit' =>
                EditRustyBeatSlide::route('/{record}/edit'),
        ];
    }
}