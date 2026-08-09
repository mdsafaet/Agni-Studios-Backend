<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandSetting extends Model
{
    protected $fillable = [
        'website_logo',
        'favicon',
    ];
}