<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyRevolverJoinSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RustyRevolverJoinSectionController extends Controller
{
     public function show(): JsonResponse
    {
        $section =
            RustyRevolverJoinSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,
                'message' =>
                    'Join section has not been configured.',
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
            ],
        ]);
    }
}
