<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RustyPressKitFactSheet;
use Illuminate\Http\JsonResponse;

class RustyPressKitFactSheetController extends Controller
{
    public function show(): JsonResponse
    {
        $factSheet =
            RustyPressKitFactSheet::query()
                ->latest('updated_at')
                ->first();

        if (! $factSheet) {
            return response()->json([
                'success' => false,

                'message' =>
                    'Press Kit Fact Sheet has not been configured.',

                'data' => null,
            ], 404);
        }

        $facts = collect(
            $factSheet->facts ?? []
        )
            ->map(
                function (
                    array $item
                ): array {
                    return [
                        'label' =>
                            $item[
                                'label'
                            ] ?? '',

                        'value' =>
                            $item[
                                'value'
                            ] ?? '',
                    ];
                }
            )
            ->filter(
                fn (array $item): bool =>
                    $item['label'] !== '' ||
                    $item['value'] !== ''
            )
            ->values();

        return response()->json([
            'success' => true,

            'data' => [
                'facts' => $facts,
            ],
        ]);
    }
}