<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowStep extends Model
{
    protected $fillable = [
        'icon_type',
        'icon',
        'icon_image',
        'image',
        'title',
        'description',
        'bottom_images',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'bottom_images' => 'array',
        ];
    }
}