<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RustyPressKitContactSocialSection extends Model
{
    protected$fillable =['social_media'];

     protected function casts(): array
    {
        return [
            'social_media' => 'array',
        ];
    }

}
