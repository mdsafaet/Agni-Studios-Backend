<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists(
            'rusty_revolver_beat_slides'
        );
    }

    public function down(): void
    {
        //
    }
};