<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitHeroSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class RustyPressKitHeroSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyPressKitHeroSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Press Kit hero section has not been configured.',

                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,

            'data' => [
                'hero_image' =>
                    $section->hero_image
                        ? Storage::disk('public')
                            ->url(
                                $section->hero_image
                            )
                        : null,

                'title' =>
                    $section->title,

                'subtitle' =>
                    $section->subtitle,

                'button_text' =>
                    $section->button_text,

                'button_url' =>
                    $section->button_url,

                'icon_type' =>
                    $section->icon_type,

                'icon' =>
                    $section->icon,

                'icon_image' =>
                    $section->icon_image
                        ? Storage::disk('public')
                            ->url(
                                $section->icon_image
                            )
                        : null,
            ],
        ]);
    }
}