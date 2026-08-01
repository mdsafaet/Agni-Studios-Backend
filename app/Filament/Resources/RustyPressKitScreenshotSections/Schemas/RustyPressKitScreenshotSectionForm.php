<?php

namespace App\Filament\Resources\RustyPressKitScreenshotSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RustyPressKitScreenshotSectionForm
{
    public static function configure(
        Schema $schema
    ): Schema {
        return $schema
            ->components([
                Section::make(
                    'Screenshots'
                )
                    ->schema([
                        FileUpload::make(
                            'screenshots'
                        )
                            ->label(
                                'Screenshot Images'
                            )
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->minFiles(1)
                            ->maxFiles(10)
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/press-kit/screenshots'
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
