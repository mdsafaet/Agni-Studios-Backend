<?php

namespace App\Filament\Resources\FooterIcons;

use App\Filament\Resources\FooterIcons\Pages\CreateFooterIcon;
use App\Filament\Resources\FooterIcons\Pages\EditFooterIcon;
use App\Filament\Resources\FooterIcons\Pages\ListFooterIcons;
use App\Filament\Resources\FooterIcons\Schemas\FooterIconForm;
use App\Filament\Resources\FooterIcons\Tables\FooterIconsTable;
use App\Models\FooterIcon;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FooterIconResource extends Resource
{
    protected static ?string $model = FooterIcon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return FooterIconForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FooterIconsTable::configure($table);
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
            'index' => ListFooterIcons::route('/'),
            'create' => CreateFooterIcon::route('/create'),
            'edit' => EditFooterIcon::route('/{record}/edit'),
        ];
    }
}
