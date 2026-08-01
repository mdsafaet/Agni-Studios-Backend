<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitGifSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class RustyPressKitGifSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $sections =
            RustyPressKitGifSection::query()
                ->orderBy('id')
                ->get();

        $gifs = $sections
            ->flatMap(
                function (
                    RustyPressKitGifSection $section
                ): array {
                    return collect(
                        $section->gifs ?? []
                    )
                        ->filter()
                        ->map(
                            fn (
                                string $gif
                            ): string =>
                                Storage::disk(
                                    'public'
                                )->url($gif)
                        )
                        ->values()
                        ->all();
                }
            )
            ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'gifs' => $gifs,
            ],
        ]);
    }
}