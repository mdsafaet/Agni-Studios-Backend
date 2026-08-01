<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_beat_slides',
            function (Blueprint $table) {
                $table->id();
                $table->string('heading', 255);
                $table->text('description');
                $table->string('mobile_image')->nullable();
                $table->string('desktop_image');
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_beat_slides'
        );
    }
};