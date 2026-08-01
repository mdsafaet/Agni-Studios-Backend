<?php

namespace App\Filament\Resources\RustyCommunitySlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class RustyCommunitySlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(
                    'Community Carousel Slide'
                )
                    ->schema([
                        FileUpload::make('image')
                            ->label(
                                'Background Image'
                            )
                            ->image()
                            ->disk('public')
                            ->directory(
                                'rusty-revolver/community-slides'
                            )
                            ->visibility('public')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('heading')
                            ->label('Title')
                            ->placeholder(
                                "We Need You\nAgainst the Evil Corp"
                            )
                            ->helperText(
                                'Press Enter to create a new title line.'
                            )
                            ->rows(3)
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),

                        TextInput::make(
                            'button_text'
                        )
                            ->label('Button Text')
                            ->placeholder(
                                'Join Our Community'
                            )
                            ->required()
                            ->maxLength(100),

                        TextInput::make(
                            'button_url'
                        )
                            ->label('Button Link')
                            ->placeholder(
                                'https://discord.gg/example'
                            )
                            ->nullable()
                            ->maxLength(2048),

                        Repeater::make(
                            'social_links'
                        )
                            ->label(
                                'Social Media Icons'
                            )
                            ->schema([
                                TextInput::make(
                                    'label'
                                )
                                    ->label(
                                        'Platform'
                                    )
                                    ->placeholder(
                                        'Facebook'
                                    )
                                    ->required()
                                    ->maxLength(
                                        100
                                    ),

                                TextInput::make(
                                    'href'
                                )
                                    ->label(
                                        'Social Link'
                                    )
                                    ->placeholder(
                                        'https://facebook.com/example'
                                    )
                                    ->nullable()
                                    ->maxLength(
                                        2048
                                    ),

                                Select::make(
                                    'icon_type'
                                )
                                    ->label(
                                        'Icon Type'
                                    )
                                    ->options([
                                        'react_icon' =>
                                            'React Icon',

                                        'image' =>
                                            'Uploaded Image',
                                    ])
                                    ->default(
                                        'react_icon'
                                    )
                                    ->required()
                                    ->live()
                                    ->native(false),

                                Select::make(
                                    'icon'
                                )
                                    ->label(
                                        'React Icon'
                                    )
                                    ->options([
                                        'Facebook' =>
                                            'Facebook',

                                        'Twitch' =>
                                            'Twitch',

                                        'LinkedIn' =>
                                            'LinkedIn',

                                        'Snapchat' =>
                                            'Snapchat',

                                        'TikTok' =>
                                            'TikTok',

                                        'X' =>
                                            'X',

                                        'Discord' =>
                                            'Discord',

                                        'YouTube' =>
                                            'YouTube',
                                    ])
                                    ->visible(
                                        fn (
                                            Get $get
                                        ): bool =>
                                            $get(
                                                'icon_type'
                                            ) ===
                                            'react_icon'
                                    )
                                    ->nullable()
                                    ->native(false),

                                FileUpload::make(
                                    'icon_image'
                                )
                                    ->label(
                                        'Icon Image'
                                    )
                                    ->image()
                                    ->disk('public')
                                    ->directory(
                                        'rusty-revolver/community-social-icons'
                                    )
                                    ->visibility(
                                        'public'
                                    )
                                    ->visible(
                                        fn (
                                            Get $get
                                        ): bool =>
                                            $get(
                                                'icon_type'
                                            ) ===
                                            'image'
                                    )
                                    ->nullable(),

                                Toggle::make(
                                    'is_active'
                                )
                                    ->label('Active')
                                    ->default(true),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->maxItems(8)
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),

                        TextInput::make(
                            'sort_order'
                        )
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