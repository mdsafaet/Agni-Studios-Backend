<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyBeatSlide;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RustyBeatSlideController extends Controller
{
    public function index(): JsonResponse
    {
        $slides = RustyBeatSlide::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (RustyBeatSlide $slide): array => [
                'id' => $slide->id,
                'heading' => $slide->heading,
                'description' => $slide->description,

                'mobile_image' =>
                    $slide->mobile_image
                        ? Storage::disk('public')
                            ->url($slide->mobile_image)
                        : null,

                'desktop_image' =>
                    $slide->desktop_image
                        ? Storage::disk('public')
                            ->url($slide->desktop_image)
                        : null,

                'sort_order' => $slide->sort_order,
            ])
            ->values();

        return response()->json([
            'success' => true,
            'data' => [
                'slides' => $slides,
            ],
        ]);
    }
}
