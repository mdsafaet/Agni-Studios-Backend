<?php

namespace App\Filament\Resources\RustyCommunitySlides;

use App\Filament\Resources\RustyCommunitySlides\Pages\CreateRustyCommunitySlide;
use App\Filament\Resources\RustyCommunitySlides\Pages\EditRustyCommunitySlide;
use App\Filament\Resources\RustyCommunitySlides\Pages\ListRustyCommunitySlides;
use App\Filament\Resources\RustyCommunitySlides\Pages\ViewRustyCommunitySlide;
use App\Filament\Resources\RustyCommunitySlides\Schemas\RustyCommunitySlideForm;
use App\Filament\Resources\RustyCommunitySlides\Schemas\RustyCommunitySlideInfolist;
use App\Filament\Resources\RustyCommunitySlides\Tables\RustyCommunitySlidesTable;
use App\Models\RustyCommunitySlide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RustyCommunitySlideResource extends Resource
{
    protected static ?string $model =
        RustyCommunitySlide::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Rusty Revolver';

    protected static ?string $navigationLabel =
        'Community Carousel';

    protected static ?string $modelLabel =
        'Community Slide';

    protected static ?string $pluralModelLabel =
        'Community Slides';

    protected static ?string $recordTitleAttribute =
        'heading';

    protected static ?int $navigationSort =
        7;

    public static function form(Schema $schema): Schema
    {
        return RustyCommunitySlideForm::configure(
            $schema
        );
    }

    public static function infolist(Schema $schema): Schema
    {
        return RustyCommunitySlideInfolist::configure(
            $schema
        );
    }

    public static function table(Table $table): Table
    {
        return RustyCommunitySlidesTable::configure(
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
                ListRustyCommunitySlides::route('/'),

            'create' =>
                CreateRustyCommunitySlide::route('/create'),

            'view' =>
                ViewRustyCommunitySlide::route('/{record}'),

            'edit' =>
                EditRustyCommunitySlide::route('/{record}/edit'),
        ];
    }
}