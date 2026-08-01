<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
        public function show(): JsonResponse
{
    $heroSection = HeroSection::query()
        ->where('is_active', true)
        ->latest('updated_at')
        ->first();

    if (! $heroSection) {
        return response()->json([
            'success' => false,
            'message' => 'No active hero section was found.',
            'data' => null,
        ], 404);
    }

    $extension = strtolower(
        pathinfo($heroSection->media, PATHINFO_EXTENSION)
    );

    $videoExtensions = ['mp4', 'webm', 'mov'];

    $mediaUrl = Storage::disk('public')
        ->url($heroSection->media);

    return response()->json([
        'success' => true,
        'data' => [
            'media' => $mediaUrl . '?v=' . $heroSection->updated_at->timestamp,
            'media_type' => in_array(
                $extension,
                $videoExtensions,
                true
            ) ? 'video' : 'image',
        ],
    ]);
}
}
