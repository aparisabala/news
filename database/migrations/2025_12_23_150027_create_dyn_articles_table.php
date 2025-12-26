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
        Schema::create('dyn_articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('slug');
            $table->longText('content')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('extension')->nullable();
            $table->string('status',7)->default('Active');
            $table->integer('page_view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dyn_articles');
    }
};
