<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyTrailerSection extends Model
{
        protected $fillable = [
        'heading',
        'description',
        'video_type',
        'video_file',
        'youtube_url',
    ];
}
