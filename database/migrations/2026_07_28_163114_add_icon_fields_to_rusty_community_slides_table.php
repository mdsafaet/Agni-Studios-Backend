<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'rusty_community_slides',
            function (Blueprint $table) {
                $table
                    ->string('icon_type', 20)
                    ->default('react_icon')
                    ->after('button_url');

                $table
                    ->string('icon', 50)
                    ->nullable()
                    ->after('icon_type');

                $table
                    ->string('icon_image')
                    ->nullable()
                    ->after('icon');
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'rusty_community_slides',
            function (Blueprint $table) {
                $table->dropColumn([
                    'icon_type',
                    'icon',
                    'icon_image',
                ]);
            }
        );
    }
};