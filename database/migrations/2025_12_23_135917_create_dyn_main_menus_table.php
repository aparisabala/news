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
        Schema::create('dyn_main_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dyn_page_id');
            $table->string('link_to')->default('_self');
            $table->integer('serial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dyn_main_menus');
    }
};
