<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Media')
                    ->description(
                        'Upload the image or video displayed in the hero section.'
                    )
                    ->schema([
                        FileUpload::make('media')
                            ->label('Hero Image or Video')
                            ->helperText(
                                'Accepted: JPG, PNG, WebP, MP4, WebM, or MOV. Maximum size: 20 MB.'
                            )
                            ->disk('public')
                            ->directory('hero')
                            ->visibility('public')
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                                'video/mp4',
                                'video/webm',
                                'video/quicktime',
                            ])
                            ->maxSize(153600)
                            ->required()
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),

                            TextInput::make('alt_text')
    ->label('Hero Image Alt Text')
    ->placeholder(
        'Describe the hero image'
    )
    ->nullable()
    ->maxLength(255)
    ->helperText(
        'Used for accessibility and image SEO.'
    )
    ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Active Hero')
                            ->helperText(
                                'Activating this hero automatically deactivates the others.'
                            )
                            ->default(false)
                            ->inline(false),
                    ]),
            ]);
    }
}