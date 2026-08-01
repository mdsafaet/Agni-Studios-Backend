<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'rusty_press_kit_fact_sheets',
            function (Blueprint $table) {
                $table->id();

                $table->json(
                    'facts'
                )->nullable();

                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'rusty_press_kit_fact_sheets'
        );
    }
};