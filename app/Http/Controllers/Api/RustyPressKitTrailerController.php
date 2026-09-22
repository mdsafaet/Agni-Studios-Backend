<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitTrailer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class RustyPressKitTrailerController extends Controller
{
    public function index(): JsonResponse
    {
        $trailers = RustyPressKitTrailer::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (RustyPressKitTrailer $trailer): array {
                return [
                    'id' => $trailer->id,
                    'title' => $trailer->title,
                    'video_type' => $trailer->video_type,

                    'youtube_url' =>
                        $trailer->video_type === 'youtube'
                            ? $trailer->youtube_url
                            : null,

                    'video_file' =>
                        $trailer->video_type === 'upload'
                            && $trailer->video_file
                            ? Storage::disk('public')
                                ->url($trailer->video_file)
                            : null,

                    'sort_order' => $trailer->sort_order,
                ];
            })
            ->values();

        return response()->json([
            'success' => true,
            'data' => [
                'trailers' => $trailers,
            ],
        ]);
    }
}