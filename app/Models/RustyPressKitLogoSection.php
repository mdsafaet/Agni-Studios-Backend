<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitLogoSection extends Model
{
    protected $fillable = [
        'logos',
    ];

    protected function casts(): array
    {
        return [
            'logos' => 'array',
        ];
    }
}