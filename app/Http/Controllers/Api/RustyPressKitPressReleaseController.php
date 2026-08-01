<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitPressRelease;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class RustyPressKitPressReleaseController extends Controller
{
    public function index(): JsonResponse
    {
        $pressReleases =
            RustyPressKitPressRelease::query()
                ->where(
                    'is_active',
                    true
                )
                ->orderBy(
                    'sort_order'
                )
                ->orderBy('id')
                ->get()
                ->map(
                    function (
                        RustyPressKitPressRelease $release
                    ): array {
                        return [
                            'id' =>
                                $release->id,

                            'image' =>
                                $release->image
                                    ? Storage::disk(
                                        'public'
                                    )->url(
                                        $release->image
                                    )
                                    : null,

                            'title' =>
                                $release->title,

                            'body' =>
                                $release->body,

                            'link' =>
                                $release->link,

                            'sort_order' =>
                                $release->sort_order,
                        ];
                    }
                )
                ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'press_releases' =>
                    $pressReleases,
            ],
        ]);
    }
}