<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyRevolverButton extends Model
{
protected $fillable = [
    'text',
    'url',
    'icon_type',
    'icon',
    'icon_image',
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