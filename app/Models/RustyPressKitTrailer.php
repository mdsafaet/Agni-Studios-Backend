<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitTrailer extends Model
{
    protected $fillable = [
        'title',
        'video_type',
        'youtube_url',
        'video_file',
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