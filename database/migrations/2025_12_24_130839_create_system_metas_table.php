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
        Schema::create('system_metas', function (Blueprint $table) {
            $table->id();
            $table->string('service_name')->nullable();
            $table->string('service_domain')->nullable();
            $table->text('main_meta')->nullable();
            $table->text('keywords')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('meta_image')->nullable();
            $table->text('meta_tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_metas');
    }
};
