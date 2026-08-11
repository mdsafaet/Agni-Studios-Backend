<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeroSection extends Model
{
    protected $fillable = [
        'media',
          'alt_text',
        'is_active',
    ];

    protected $appends = [
        'media_url',
        'media_type',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function getMediaUrlAttribute(): ?string
    {
        if (! $this->media) {
            return null;
        }

        return Storage::disk('public')->url($this->media);
    }

    public function getMediaTypeAttribute(): string
    {
        $extension = strtolower(
            pathinfo($this->media, PATHINFO_EXTENSION)
        );

        return in_array($extension, ['mp4', 'webm', 'mov'], true)
            ? 'video'
            : 'image';
    }

    protected static function booted(): void
    {
        static::saved(function (HeroSection $heroSection): void {
            if (! $heroSection->is_active) {
                return;
            }

            HeroSection::query()
                ->where('id', '!=', $heroSection->id)
                ->where('is_active', true)
                ->update([
                    'is_active' => false,
                ]);
        });

        static::deleting(function (HeroSection $heroSection): void {
            if ($heroSection->media) {
                Storage::disk('public')->delete(
                    $heroSection->media
                );
            }
        });
    }
}