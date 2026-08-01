<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyTrailerSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RustyTrailerSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyTrailerSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,
                'message' =>
                    'Trailer section has not been configured.',
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

                'video_type' =>
                    $section->video_type,

                'video_file' =>
                    $section->video_file
                        ? Storage::disk('public')
                            ->url(
                                $section->video_file
                            )
                        : null,

                'youtube_url' =>
                    $section->youtube_url,
            ],
        ]);
    }
}
