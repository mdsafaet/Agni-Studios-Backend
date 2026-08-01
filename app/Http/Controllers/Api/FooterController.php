<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FooterIcon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    public function show(): JsonResponse
    {
        $socialLinks = FooterIcon::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(8)
            ->get()
            ->map(function (FooterIcon $footerIcon): array {
                return [
                    'icon_type' => $footerIcon->icon_type,

                    'icon' => $footerIcon->icon,

                    'icon_image' => $footerIcon->icon_image
                        ? Storage::disk('public')
                            ->url($footerIcon->icon_image)
                        : null,

                    'label' => $footerIcon->label,

                    'href' => filled($footerIcon->href)
                        ? $footerIcon->href
                        : '#',
                ];
            });

        return response()->json([
            'success' => true,
            'data' => [
                'social_links' => $socialLinks,
            ],
        ]);
    }
}