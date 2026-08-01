<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitKeyArtSection extends Model
{
     protected $fillable = [
        'key_arts',
    ];

    protected function casts(): array
    {
        return [
            'key_arts' => 'array',
        ];
    }
}
