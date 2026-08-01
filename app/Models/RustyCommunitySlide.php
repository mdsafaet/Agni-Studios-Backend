<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyCommunitySlide extends Model
{
protected $fillable = [
    'image',
    'heading',
    'button_text',
    'button_url',
    'social_links',
    'sort_order',
    'is_active',
];

protected function casts(): array
{
    return [
        'social_links' => 'array',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
}