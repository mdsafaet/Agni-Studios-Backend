<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'rusty_press_kit_about_sections',
            function (Blueprint $table): void {
                $table
                    ->string(
                        'button_url',
                        2048
                    )
                    ->nullable()
                    ->after('bottom_icon');
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'rusty_press_kit_about_sections',
            function (Blueprint $table): void {
                $table->dropColumn(
                    'button_url'
                );
            }
        );
    }
};