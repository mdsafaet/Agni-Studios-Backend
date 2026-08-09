<?php

namespace App\Filament\Resources\BrandSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandSettingForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Website Logo'
                )
                    ->description(
                        'Upload the main website logo.'
                    )
                    ->schema([
                        FileUpload::make(
                            'website_logo'
                        )
                            ->label(
                                'Website Logo'
                            )
                            ->image()
                            ->disk('public')
                            ->directory(
                                'brand/logo'
                            )
                            ->visibility(
                                'public'
                            )
                            ->imageEditor()
                            ->maxSize(5120)
                            ->required(),
                    ])
                    ->columnSpanFull(),

                Section::make(
                    'Website Favicon'
                )
                    ->description(
                        'Upload the browser favicon.'
                    )
                    ->schema([
                        FileUpload::make(
                            'favicon'
                        )
                            ->label(
                                'Website Favicon'
                            )
                            ->disk('public')
                            ->directory(
                                'brand/favicon'
                            )
                            ->visibility(
                                'public'
                            )
                            ->acceptedFileTypes([
                                'image/png',
                                'image/x-icon',
                                'image/vnd.microsoft.icon',
                                'image/svg+xml',
                                'image/webp',
                            ])
                            ->maxSize(2048)
                            ->required(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}