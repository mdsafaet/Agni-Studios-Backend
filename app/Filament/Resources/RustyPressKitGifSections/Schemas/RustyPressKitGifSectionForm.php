<?php

namespace App\Filament\Resources\RustyPressKitGifSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitGifSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'GIF Files'
                )
                    ->schema([
                        FileUpload::make(
                            'gifs'
                        )
                            ->label('GIFs')
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->minFiles(1)
                            ->maxFiles(10)
                            ->acceptedFileTypes([
                                'image/gif',
                                'image/webp',
                            ])
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/press-kit/gifs'
                            )
                            ->visibility(
                                'public'
                            )
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}