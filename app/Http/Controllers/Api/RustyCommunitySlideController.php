<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyCommunitySlide;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
//test

class RustyCommunitySlideController extends Controller
{
    public function index(): JsonResponse
    {
        $slides = RustyCommunitySlide::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (
                RustyCommunitySlide $slide
            ): array {
                $socialLinks = collect(
                    $slide->social_links ?? []
                )
                    ->filter(
                        fn (array $link): bool =>
                            $link['is_active']
                                ?? true
                    )
                    ->take(8)
                    ->values()
                    ->map(function (
                        array $link
                    ): array {
                        $imagePath =
                            $link['icon_image']
                                ?? null;

                        return [
                            'label' =>
                                $link['label']
                                    ?? '',

                            'href' =>
                                $link['href']
                                    ?? '#',

                            'icon_type' =>
                                $link['icon_type']
                                    ?? 'react_icon',

                            'icon' =>
                                $link['icon']
                                    ?? null,

                            'icon_image' =>
                                $imagePath
                                    ? Storage::disk(
                                        'public'
                                    )->url(
                                        $imagePath
                                    )
                                    : null,
                        ];
                    });

                return [
                    'id' =>
                        $slide->id,

                    'image' =>
                        $slide->image
                            ? Storage::disk('public')
                                ->url(
                                    $slide->image
                                )
                            : null,

                    'heading' =>
                        $slide->heading,

                    'button_text' =>
                        $slide->button_text,

                    'button_url' =>
                        $slide->button_url,

                    'social_links' =>
                        $socialLinks,

                    'sort_order' =>
                        $slide->sort_order,
                ];
            })
            ->values();

        return response()->json([
            'success' => true,
            'data' => [
                'slides' => $slides,
            ],
        ]);
    }
}