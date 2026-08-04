<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class SeoSettingController extends Controller
{
    public function show(string $page = 'home'): JsonResponse
    {
        $seoSetting = SeoSetting::query()
            ->where('is_active', true)
            ->where('page_key', $page)
            ->latest('updated_at')
            ->first();

        if (! $seoSetting) {
            return response()->json([
                'success' => false,
                'message' => 'SEO settings have not been configured.',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'site_title' => $seoSetting->site_title,
                'meta_description' => $seoSetting->meta_description,
                'meta_keywords' => $seoSetting->meta_keywords,
                'social_image' => $seoSetting->social_image
                    ? Storage::disk('public')->url($seoSetting->social_image)
                    : null,
                'google_analytics_id' => $seoSetting->google_analytics_id,
                'google_site_verification' => $seoSetting->google_site_verification,
            ],
        ]);
    }
}