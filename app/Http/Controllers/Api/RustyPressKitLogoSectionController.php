<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitLogoSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class RustyPressKitLogoSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyPressKitLogoSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Press Kit Logo section has not been configured.',

                'data' => null,
            ], 404);
        }

        $logos = collect(
            $section->logos ?? []
        )
            ->map(
                function (
                    array $logo
                ): ?array {
                    $image =
                        $logo['image'] ?? null;

                    if (! $image) {
                        return null;
                    }

                    return [
                        'image' =>
                            Storage::disk(
                                'public'
                            )->url($image),

                        'alt' =>
                            $logo['alt'] ??
                            'Rusty Revolver logo',
                    ];
                }
            )
            ->filter()
            ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'logos' => $logos,
            ],
        ]);
    }
}