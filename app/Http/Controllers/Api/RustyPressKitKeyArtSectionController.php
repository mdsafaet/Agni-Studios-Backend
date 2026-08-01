<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitKeyArtSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RustyPressKitKeyArtSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyPressKitKeyArtSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Press Kit Key Art section has not been configured.',

                'data' => null,
            ], 404);
        }

        $keyArts = collect(
            $section->key_arts ?? []
        )
            ->map(
                function (
                    array $item
                ): ?array {
                    $image =
                        $item['image'] ?? null;

                    if (! $image) {
                        return null;
                    }

                    return [
                        'image' =>
                            Storage::disk(
                                'public'
                            )->url($image),

                        'alt' =>
                            $item['alt'] ??
                            'Rusty Revolver key art',
                    ];
                }
            )
            ->filter()
            ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'key_arts' =>
                    $keyArts,
            ],
        ]);
    }
}
