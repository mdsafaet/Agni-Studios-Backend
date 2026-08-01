<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_press_kit_press_releases',
            function (Blueprint $table) {
                $table->id();

                $table->string(
                    'image'
                )->nullable();

                $table->string(
                    'title'
                );

                $table->text(
                    'body'
                );

                $table->string(
                    'link',
                    2048
                )->nullable();

                $table->unsignedInteger(
                    'sort_order'
                )->default(0);

                $table->boolean(
                    'is_active'
                )->default(true);

                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_press_kit_press_releases'
        );
    }
};