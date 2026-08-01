<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitAboutSection extends Model
{
    protected $fillable = [
        'cover_image',
        'paragraph_one',
        'paragraph_two',
        'bottom_icon',
    ];
}