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
        Schema::create('footer_icons', function (Blueprint $table) {
            $table->id();
             $table->string('icon_type')->default('react_icon');
            $table->string('icon')->nullable();
            $table->string('icon_image')->nullable();
            $table->string('label', 100);
            $table->string('href', 2048)->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_icons');
    }
};
