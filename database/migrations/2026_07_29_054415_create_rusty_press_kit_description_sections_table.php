<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_press_kit_description_sections',
            function (Blueprint $table) {
                $table->id();

                $table->text(
                    'paragraph_one'
                );

                $table->text(
                    'paragraph_two'
                )->nullable();

                $table->json(
                    'description_points'
                )->nullable();

                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_press_kit_description_sections'
        );
    }
};