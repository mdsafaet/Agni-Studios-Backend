<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutSetting;
use Illuminate\Http\JsonResponse;

class AboutSettingController extends Controller
{
    public function show(): JsonResponse
    {
        $aboutSetting = AboutSetting::query()
            ->latest('updated_at')
            ->first();

        if (! $aboutSetting) {
            return response()->json([
                'success' => false,
                'message' =>
                    'About section has not been configured.',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'heading' =>
                    $aboutSetting->heading,

                'description' =>
                    $aboutSetting->description,
            ],
        ]);
    }
}