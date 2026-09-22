<?php

namespace App\Filament\Resources\RustyPressKitTrailers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class RustyPressKitTrailerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Trailer')
                ->schema([
                    TextInput::make('title')
                        ->label('Trailer Title')
                        ->maxLength(255),

                    Select::make('video_type')
                        ->label('Video Type')
                        ->options([
                            'youtube' => 'YouTube',
                            'upload' => 'Upload Video',
                        ])
                        ->default('youtube')
                        ->required()
                        ->live(),

                    TextInput::make('youtube_url')
                        ->label('YouTube URL')
                        ->placeholder('https://www.youtube.com/watch?v=...')
                        ->url()
                        ->required(
                            fn (Get $get): bool =>
                                $get('video_type') === 'youtube'
                        )
                        ->visible(
                            fn (Get $get): bool =>
                                $get('video_type') === 'youtube'
                        )
                        ->columnSpanFull(),

                    FileUpload::make('video_file')
                        ->label('Video File')
                        ->disk('public')
                        ->directory('rusty-revolver/press-kit/trailers')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'video/mp4',
                            'video/webm',
                        ])
                        ->maxSize(20480) // 20 MB, in KB
                        ->required(
                            fn (Get $get): bool =>
                                $get('video_type') === 'upload'
                        )
                        ->visible(
                            fn (Get $get): bool =>
                                $get('video_type') === 'upload'
                        )
                        ->openable()
                        ->downloadable()
                        ->columnSpanFull(),

                    TextInput::make('sort_order')
                        ->label('Display Order')
                        ->numeric()
                        ->minValue(0)
                        ->default(0)
                        ->required(),

                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
                ]),
        ]);
    }
}