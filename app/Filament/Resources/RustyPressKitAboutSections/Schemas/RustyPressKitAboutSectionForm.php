<?php

namespace App\Filament\Resources\RustyPressKitAboutSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitAboutSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'About the Game Content'
                )
                    ->schema([
                        FileUpload::make(
                            'cover_image'
                        )
                            ->label(
                                'Cover Image'
                            )
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/press-kit/about'
                            )
                            ->visibility(
                                'public'
                            )
                            ->required(),

                        Textarea::make(
                            'paragraph_one'
                        )
                            ->label(
                                'First Paragraph'
                            )
                            ->rows(5)
                            ->required()
                            ->maxLength(5000),

                        Textarea::make(
                            'paragraph_two'
                        )
                            ->label(
                                'Second Paragraph'
                            )
                            ->rows(5)
                            ->nullable()
                            ->maxLength(5000),

                        FileUpload::make(
                            'bottom_icon'
                        )
                            ->label(
                                'Bottom Icon'
                            )
                            ->image()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/press-kit/about-icons'
                            )
                            ->visibility(
                                'public'
                            )
                            ->nullable(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}