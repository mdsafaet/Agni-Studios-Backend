<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitSection extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'button_text',
        'button_url',
    ];
}
