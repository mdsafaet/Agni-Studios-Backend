<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitScreenshotSection extends Model
{
    protected $fillable = [
        'screenshots',
    ];

    protected function casts(): array
    {
        return [
            'screenshots' => 'array',
        ];
    }
}