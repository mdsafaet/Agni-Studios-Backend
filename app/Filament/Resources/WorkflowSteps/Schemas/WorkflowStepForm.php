<?php

namespace App\Filament\Resources\WorkflowSteps\Schemas;


use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class WorkflowStepForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Workflow Selector')
                    ->description(
                        'Choose the selector shown above the workflow content.'
                    )
                    ->schema([
                        Select::make('icon_type')
                            ->label('Selector Type')
                            ->options([
                                'react_icon' => 'React Icon',
                                'image' => 'Uploaded Icon Image',
                            ])
                            ->default('react_icon')
                            ->required()
                            ->live(),

                        Select::make('icon')
                            ->label('Selector Icon')
                            ->options([
                                'Gamepad2' => 'Gamepad',
                                'Puzzle' => 'Puzzle',
                                'Sword' => 'Sword',
                                'Headphones' => 'Headphones',
                                'CircleDot' => 'Circle Dot',
                            ])
                            ->searchable()
                            ->native(false)
                            ->required(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'react_icon'
                            )
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'react_icon'
                            ),

                        FileUpload::make('icon_image')
                            ->label('Selector Icon Image')
                            ->helperText(
                                'Upload PNG, JPG, WebP, or SVG. Maximum size: 2 MB.'
                            )
                            ->disk('public')
                            ->directory('workflow/icons')
                            ->visibility('public')
                            ->image()
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                                'image/svg+xml',
                            ])
                            ->maxSize(2048)
                            ->openable()
                            ->required(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'image'
                            )
                            ->visible(
                                fn (Get $get): bool =>
                                    $get('icon_type') === 'image'
                            ),
                    ])
                    ->columns(2),

                Section::make('Workflow Content')
                    ->description(
                        'The image and text displayed when this selector is clicked.'
                    )
                    ->schema([
                        FileUpload::make('image')
                            ->label('Main Content Image')
                            ->disk('public')
                            ->directory('workflow/images')
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
                            ->label('Title')
                            ->placeholder('Research & Concept')
                            ->required()
                            ->maxLength(150)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder(
                                'Enter the workflow step description.'
                            )
                            ->required()
                            ->rows(6)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),


                FileUpload::make('bottom_images')
                    ->label('Bottom Images')
                    ->image()
                    ->multiple()
                    ->maxFiles(4)
                    ->reorderable()
                    ->appendFiles()
                    ->disk('public')
                    ->directory('workflow/bottom-images')
                    ->visibility('public')
                    ->columnSpanFull(),

                Section::make('Display Settings')
                    ->schema([
                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->helperText(
                                'Lower numbers are displayed first.'
                            )
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Show Workflow Step')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}