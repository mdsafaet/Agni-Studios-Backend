<?php

namespace App\Filament\Resources\BrandSettings\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandSettingInfolist
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Website Branding'
                )
                    ->schema([
                        ImageEntry::make(
                            'website_logo'
                        )
                            ->label(
                                'Website Logo'
                            )
                            ->disk('public'),

                        ImageEntry::make(
                            'favicon'
                        )
                            ->label('Favicon')
                            ->disk('public'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}