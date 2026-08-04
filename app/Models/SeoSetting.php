<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
protected $fillable = [
    'page_key',
    'site_title',
    'meta_description',
    'meta_keywords',
    'social_image',
    'google_analytics_id',
    'google_site_verification',
];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}