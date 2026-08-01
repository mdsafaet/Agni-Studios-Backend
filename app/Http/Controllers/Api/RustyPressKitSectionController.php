<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RustyPressKitSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyPressKitSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,
                'message' =>
                    'Press Kit section has not been configured.',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'heading' =>
                    $section->heading,

                'description' =>
                    $section->description,

                'button_text' =>
                    $section->button_text,

                'button_url' =>
                    $section->button_url,
            ],
        ]);
    }
}
