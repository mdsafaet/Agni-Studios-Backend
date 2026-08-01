<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_trailer_sections',
            function (Blueprint $table) {
                $table->id();
                $table->string('heading', 255);
                $table->text('description');
                $table
                    ->string('video_type', 20)
                    ->default('youtube');

                $table->string('video_file')->nullable();
                $table->string('youtube_url', 2048)->nullable();
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_trailer_sections'
        );
    }
};