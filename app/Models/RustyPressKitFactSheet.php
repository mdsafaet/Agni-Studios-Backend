<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitFactSheet extends Model
{
    protected $fillable = [
        'facts',
    ];

    protected function casts(): array
    {
        return [
            'facts' => 'array',
        ];
    }
}