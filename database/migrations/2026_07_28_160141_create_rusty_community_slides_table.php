<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_community_slides',
            function (Blueprint $table) {
                $table->id();
                $table->string('image');
                $table->text('heading');
                $table->string('button_text', 100);
                $table->string('button_url', 2048)->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_community_slides'
        );
    }
};