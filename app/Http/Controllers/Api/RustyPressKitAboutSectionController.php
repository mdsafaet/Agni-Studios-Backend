<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitAboutSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class RustyPressKitAboutSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyPressKitAboutSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Press Kit About section has not been configured.',

                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,

            'data' => [
                'cover_image' =>
                    $section->cover_image
                        ? Storage::disk('public')
                            ->url(
                                $section->cover_image
                            )
                        : null,

                'paragraph_one' =>
                    $section->paragraph_one,

                'paragraph_two' =>
                    $section->paragraph_two,

                'bottom_icon' =>
                    $section->bottom_icon
                        ? Storage::disk('public')
                            ->url(
                                $section->bottom_icon
                            )
                        : null,
            ],
        ]);
    }
}