<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyRevolverButton;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RustyRevolverButtonController extends Controller
{
       public function index(): JsonResponse
    {
        $buttons = RustyRevolverButton::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (
                RustyRevolverButton $button
            ): array {
                return [
                    'id' => $button->id,
                    'text' => $button->text,
                    'url' => $button->url,
                    'icon_type' =>
                        $button->icon_type,

                    'icon' =>
                        $button->icon,

                    'icon_image' =>
                        $button->icon_image
                            ? Storage::disk('public')
                                ->url(
                                    $button->icon_image
                                )
                            : null,

                    'sort_order' =>
                        $button->sort_order,
                ];
            });

        return response()->json([
            'success' => true,
            'data' => [
                'buttons' => $buttons,
            ],
        ]);
    }
}
