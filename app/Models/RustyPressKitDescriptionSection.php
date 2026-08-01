<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitDescriptionSection extends Model
{
    protected $fillable = [
        'paragraph_one',
        'paragraph_two',
        'description_points',
    ];

    protected function casts(): array
    {
        return [
            'description_points' =>
                'array',
        ];
    }
}