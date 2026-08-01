<?php

namespace App\Filament\Resources\RustyBeatSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyBeatSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Carousel Slide')
                    ->schema([
                        TextInput::make('heading')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->required()
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        FileUpload::make('desktop_image')
                            ->label('Desktop Image')
                            ->image()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/beat-slides/desktop'
                            )
                            ->visibility('public')
                            ->required(),

                        FileUpload::make('mobile_image')
                            ->label('Mobile Image')
                            ->image()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/beat-slides/mobile'
                            )
                            ->visibility('public')
                            ->nullable(),

                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}