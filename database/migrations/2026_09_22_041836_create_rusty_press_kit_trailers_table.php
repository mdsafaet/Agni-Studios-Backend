<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rusty_press_kit_trailers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('video_type'); // youtube or upload
            $table->text('youtube_url')->nullable();
            $table->string('video_file')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rusty_press_kit_trailers');
    }
};