<?php

namespace App\Filament\Resources\RustyTrailerSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class RustyTrailerSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Trailer Content')
                    ->schema([
                        TextInput::make('heading')
                            ->label('Title')
                            ->placeholder(
                                'Gameplay Trailer'
                            )
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        Select::make('video_type')
                            ->label('Video Type')
                            ->options([
                                'youtube' =>
                                    'YouTube URL',

                                'upload' =>
                                    'Upload Video',
                            ])
                            ->default('youtube')
                            ->required()
                            ->live()
                            ->native(false),

                        TextInput::make('youtube_url')
                            ->label('YouTube URL')
                            ->placeholder(
                                'https://www.youtube.com/watch?v=...'
                            )
                            ->url()
                            ->maxLength(2048)
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('video_type') ===
                                    'youtube'
                            )
                            ->required(
                                fn (Get $get): bool =>
                                    $get('video_type') ===
                                    'youtube'
                            ),

                        FileUpload::make('video_file')
                            ->label('Upload Video')
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/trailers'
                            )
                            ->visibility('public')
                            ->acceptedFileTypes([
                                'video/mp4',
                                'video/webm',
                                'video/quicktime',
                            ])
                            ->maxSize(153600)
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('video_type') ===
                                    'upload'
                            )
                            ->required(
                                fn (Get $get): bool =>
                                    $get('video_type') ===
                                    'upload'
                            ),
                    ])
                    ->columns(2),
            ]);
    }
}