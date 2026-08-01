<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitHeroSection extends Model
{
    protected $fillable = [
        'hero_image',
        'title',
        'subtitle',
        'button_text',
        'button_url',
        'icon_type',
        'icon',
        'icon_image',
    ];
}