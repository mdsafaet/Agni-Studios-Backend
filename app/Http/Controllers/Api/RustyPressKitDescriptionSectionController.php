<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitDescriptionSection;
use Illuminate\Http\JsonResponse;

class RustyPressKitDescriptionSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyPressKitDescriptionSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Press Kit Description section has not been configured.',

                'data' => null,
            ], 404);
        }

        $descriptionPoints = collect(
            $section->description_points ?? []
        )
            ->map(
                fn (array $item): ?string =>
                    $item['point'] ?? null
            )
            ->filter()
            ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'paragraph_one' =>
                    $section->paragraph_one,

                'paragraph_two' =>
                    $section->paragraph_two,

                'description_points' =>
                    $descriptionPoints,
            ],
        ]);
    }
}