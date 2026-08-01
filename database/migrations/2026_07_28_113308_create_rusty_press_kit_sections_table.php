<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_press_kit_sections',
            function (Blueprint $table) {
                $table->id();
                $table->string('heading', 255);
                $table->text('description');
                $table->string('button_text', 100);
                $table->string('button_url', 2048)->nullable();
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_press_kit_sections'
        );
    }
};