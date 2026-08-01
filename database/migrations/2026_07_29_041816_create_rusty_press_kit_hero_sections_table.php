<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_press_kit_hero_sections',
            function (Blueprint $table) {
                $table->id();

                $table->string(
                    'hero_image'
                );

                $table->text(
                    'title'
                );

                $table->string(
                    'subtitle'
                );

                $table->string(
                    'button_text'
                );

                $table->string(
                    'button_url',
                    2048
                )->nullable();

                $table->string(
                    'icon_type'
                )->default(
                    'react_icon'
                );

                $table->string(
                    'icon'
                )->nullable();

                $table->string(
                    'icon_image'
                )->nullable();

                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_press_kit_hero_sections'
        );
    }
};