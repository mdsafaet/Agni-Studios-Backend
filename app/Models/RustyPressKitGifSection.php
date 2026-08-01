<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitGifSection extends Model
{
    protected $fillable = [
        'gifs',
    ];

    protected function casts(): array
    {
        return [
            'gifs' => 'array',
        ];
    }
}