<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sender Information')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Name'),

                        TextEntry::make('email')
                            ->label('Email')
                            ->copyable(),

                        TextEntry::make('created_at')
                            ->label('Received')
                            ->dateTime('F j, Y, g:i A'),
                    ])
                    ->columns(3),

                Section::make('Message')
                    ->schema([
                        TextEntry::make('message')
                            ->label('')
                            ->columnSpanFull(),
                    ]),

                Section::make('Message Status')
                    ->schema([
                        TextEntry::make('is_read')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(
                                fn (bool $state): string =>
                                    $state ? 'Read' : 'Unread'
                            )
                            ->color(
                                fn (bool $state): string =>
                                    $state ? 'success' : 'danger'
                            ),

                        TextEntry::make('read_at')
                            ->label('Read At')
                            ->dateTime('F j, Y, g:i A')
                            ->placeholder('Not read yet'),
                    ])
                    ->columns(2),

                Section::make('Technical Information')
                    ->collapsed()
                    ->schema([
                        TextEntry::make('ip_address')
                            ->label('IP Address')
                            ->placeholder('Not available'),

                        TextEntry::make('user_agent')
                            ->label('Browser/User Agent')
                            ->placeholder('Not available'),
                    ]),
            ]);
    }
}