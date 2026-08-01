<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitContactSocialSection;
use Illuminate\Http\JsonResponse;

class RustyPressKitContactSocialSectionController extends Controller
{
    public function show(): JsonResponse
    {
        $section =
            RustyPressKitContactSocialSection::query()
                ->latest('updated_at')
                ->first();

        if (! $section) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Press Kit Contact Social Media has not been configured.',

                'data' => null,
            ], 404);
        }

        $socialMedia = collect(
            $section->social_media ?? []
        )
            ->filter(
                fn (array $item): bool =>
                    $item[
                        'is_active'
                    ] ?? true
            )
            ->map(
                fn (
                    array $item
                ): array => [
                    'label' =>
                        $item[
                            'label'
                        ] ?? '',

                    'href' =>
                        $item[
                            'href'
                        ] ?? null,
                ]
            )
            ->filter(
                fn (array $item): bool =>
                    $item['label'] !== ''
            )
            ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'social_media' =>
                    $socialMedia,
            ],
        ]);
    }
}