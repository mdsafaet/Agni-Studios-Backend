<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_slides', function (Blueprint $table) {
            $table->id();
             $table->string('title', 150);
            $table->text('description');
            $table->string('image');
            $table->string('downloads', 50)->nullable();
            $table->string('wishlist', 50)->nullable();
            $table->string('rating', 20)->nullable();
            $table->string('button_text', 100)
                ->default('Discover More');
            $table->string('button_url', 2048)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_slides');
    }
};
