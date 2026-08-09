<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BrandSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class BrandSettingController extends Controller
{
    public function show(): JsonResponse
    {
        $brandSetting =
            BrandSetting::query()
                ->latest('updated_at')
                ->first();

        if (! $brandSetting) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Brand settings have not been configured.',

                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,

            'data' => [
                'website_logo' =>
                    $brandSetting->website_logo
                        ? Storage::disk(
                            'public'
                        )->url(
                            $brandSetting
                                ->website_logo
                        )
                        : null,

                'favicon' =>
                    $brandSetting->favicon
                        ? Storage::disk(
                            'public'
                        )->url(
                            $brandSetting
                                ->favicon
                        )
                        : null,
            ],
        ]);
    }
}