<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyBeatSlide extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'mobile_image',
        'desktop_image',
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