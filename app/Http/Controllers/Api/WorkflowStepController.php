<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkflowStep;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class WorkflowStepController extends Controller
{
    public function index(): JsonResponse
    {
        $workflows = WorkflowStep::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function (WorkflowStep $workflow): array {
                return [
                    'id' => $workflow->id,

                    'icon_type' =>
                        $workflow->icon_type,

                    'icon' =>
                        $workflow->icon,

                    'icon_image' => $workflow->icon_image
                        ? Storage::disk('public')->url(
                            $workflow->icon_image
                        )
                        : null,

                    'image' => $workflow->image
                        ? Storage::disk('public')->url(
                            $workflow->image
                        )
                        : null,

                    'bottom_images' => collect(
                        $workflow->bottom_images ?? []
                    )
                        ->filter()
                        ->map(
                            fn (string $image): string =>
                                Storage::disk('public')->url(
                                    $image
                                )
                        )
                        ->values()
                        ->all(),

                    'title' =>
                        $workflow->title,

                    'description' =>
                        $workflow->description,

                    'sort_order' =>
                        $workflow->sort_order,
                ];
            });

        return response()->json([
            'success' => true,
            'data' => [
                'workflows' => $workflows,
            ],
        ]);
    }
}