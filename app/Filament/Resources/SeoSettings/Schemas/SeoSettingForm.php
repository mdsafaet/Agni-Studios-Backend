<?php

namespace App\Filament\Resources\SeoSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;


class SeoSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_title')
                    ->label('Website Title')
                    ->required()
                    ->maxLength(60)
                    ->helperText(
                        'Recommended maximum length: 60 characters.'
                    )
                    ->columnSpanFull(),

                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->rows(4)
                    ->maxLength(160)
                    ->helperText(
                        'Recommended maximum length: 160 characters.'
                    )
                    ->columnSpanFull(),

                Textarea::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->rows(3)
                    ->helperText(
                        'Separate keywords with commas.'
                    )
                    ->columnSpanFull(),

                FileUpload::make('social_image')
                    ->label('Social Sharing Image')
                    ->image()
                    ->disk('public')
                    ->directory('seo')
                    ->visibility('public')
                    ->imageEditor()
                    ->maxSize(5120)
                    ->helperText(
                        'Recommended size: 1200 × 630 pixels.'
                    )
                    ->columnSpanFull(),

                    TextInput::make(
    'google_analytics_id'
)
    ->label(
        'Google Analytics ID'
    )
    ->placeholder(
        'G-KW44WMR6HE'
    )
    ->helperText(
        'Enter the GA4 Measurement ID beginning with G-.'
    )
    ->regex(
        '/^G-[A-Z0-9]+$/i'
    )
    ->nullable()
    ->maxLength(50),

TextInput::make(
    'google_site_verification'
)
    ->label(
        'Google Site Verification'
    )
    ->placeholder(
        'vXhip2CF4g39cmVX9LkT3oWOkCneZnHdUZWBotAsf7E'
    )
    ->helperText(
        'Enter only the verification token, without google-site-verification=.'
    )
    ->nullable()
    ->maxLength(255),

                Toggle::make('is_active')
                    ->label('Active SEO Setting')
                    ->default(true),
            ]);
    }
}