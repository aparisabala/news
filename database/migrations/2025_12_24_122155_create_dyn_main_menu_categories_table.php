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
        Schema::create('dyn_main_menu_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dyn_main_menu_id');
            $table->foreignId('dyn_category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dyn_main_menu_categories');
    }
};
