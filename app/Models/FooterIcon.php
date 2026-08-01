<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterIcon extends Model
{
     protected $fillable = [
        'icon_type',
        'icon',
        'icon_image',
        'label',
        'href',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
