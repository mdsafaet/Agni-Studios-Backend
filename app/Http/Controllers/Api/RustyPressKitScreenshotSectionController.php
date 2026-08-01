<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitScreenshotSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class RustyPressKitScreenshotSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $sections =
            RustyPressKitScreenshotSection::query()
                ->orderBy('id')
                ->get();

        $screenshots = $sections
            ->flatMap(
                function (
                    RustyPressKitScreenshotSection $section
                ): array {
                    return collect(
                        $section->screenshots ?? []
                    )
                        ->filter()
                        ->map(
                            fn (
                                string $image
                            ): string =>
                                Storage::disk(
                                    'public'
                                )->url($image)
                        )
                        ->values()
                        ->all();
                }
            )
            ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'screenshots' =>
                    $screenshots,
            ],
        ]);
    }
}