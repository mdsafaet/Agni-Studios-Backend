<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitPressRelease extends Model
{
    protected $fillable = [
        'image',
        'title',
        'body',
        'link',
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