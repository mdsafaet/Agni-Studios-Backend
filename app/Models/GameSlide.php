<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameSlide extends Model
{
     protected $fillable = [
        'title',
        'description',
        'image',
        'downloads',
        'wishlist',
        'rating',
        'button_text',
        'button_url',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
