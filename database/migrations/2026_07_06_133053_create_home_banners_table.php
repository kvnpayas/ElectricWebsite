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
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->string('label', 100)->nullable();
            $table->string('headline', 200);
            $table->text('sub')->nullable();
            $table->string('cta_text', 60)->nullable();
            $table->string('cta_href', 500)->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->string('bg_image_path')->nullable();
            $table->string('bg_image_name')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_banners');
    }
};
