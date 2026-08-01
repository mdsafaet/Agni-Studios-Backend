<?php

namespace App\Filament\Resources\GameSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GameSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Game Information')
                    ->description(
                        'Manage the carousel image and game card information.'
                    )
                    ->schema([
                        FileUpload::make('image')
                            ->label('Background Image')
                            ->disk('public')
                            ->directory('game-slides')
                            ->visibility('public')
                            ->image()
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                            ])
                            ->maxSize(10240)
                            ->imageEditor()
                            ->openable()
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Game Title')
                            ->placeholder('Rusty Revolver')
                            ->required()
                            ->maxLength(150),

                        Textarea::make('description')
                            ->label('Game Description')
                            ->placeholder(
                                'Enter the game description.'
                            )
                            ->required()
                            ->rows(5)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        TextInput::make('downloads')
                            ->label('Downloads')
                            ->placeholder('1K+')
                            ->nullable()
                            ->maxLength(50),

                        TextInput::make('wishlist')
                            ->label('Wishlist')
                            ->placeholder('5K+')
                            ->nullable()
                            ->maxLength(50),

                        TextInput::make('rating')
                            ->label('Rating')
                            ->placeholder('4.8')
                            ->nullable()
                            ->maxLength(20),

                        TextInput::make('button_text')
                            ->label('Button Text')
                            ->default('Discover More')
                            ->required()
                            ->maxLength(100),

TextInput::make('button_url')
    ->label('Button Link')
    ->placeholder('/rusty-revolver or https://example.com/game')
    ->nullable()
    ->maxLength(2048)
    ->rules([
        function () {
            return function (
                string $attribute,
                mixed $value,
                \Closure $fail
            ): void {
                if (
                    filled($value) &&
                    ! str_starts_with($value, '/') &&
                    ! filter_var($value, FILTER_VALIDATE_URL)
                ) {
                    $fail(
                        'Enter an internal path beginning with / or a complete URL.'
                    );
                }
            };
        },
    ]),

                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Show Slide')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}