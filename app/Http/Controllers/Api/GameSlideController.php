<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GameSlide;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameSlideController extends Controller
{
     public function index(): JsonResponse
    {
        $games = GameSlide::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (GameSlide $gameSlide): array {
                return [
                    'id' => $gameSlide->id,

                    'title' => $gameSlide->title,

                    'description' =>
                        $gameSlide->description,

                    'image' => Storage::disk('public')
                        ->url($gameSlide->image),

                    'downloads' =>
                        $gameSlide->downloads,

                    'wishlist' =>
                        $gameSlide->wishlist,

                    'rating' =>
                        $gameSlide->rating,

                    'button_text' =>
                        $gameSlide->button_text,

                    'button_url' =>
                        $gameSlide->button_url,
                ];
            });

        return response()->json([
            'success' => true,
            'data' => [
                'games' => $games,
            ],
        ]);
    }
}
