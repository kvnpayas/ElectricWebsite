<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key', 100)->primary();
            $table->text('value')->nullable();
        });

        Schema::create('setting_phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 30);
            $table->string('type', 10)->default('cellphone'); // landline | cellphone
            $table->string('label', 100)->nullable();
            $table->boolean('is_primary')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('setting_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address', 255);
            $table->string('label', 100)->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('setting_socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('platform', 50); // Facebook | X | Instagram | YouTube | LinkedIn | TikTok
            $table->string('url', 500);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setting_socials');
        Schema::dropIfExists('setting_emails');
        Schema::dropIfExists('setting_phones');
        Schema::dropIfExists('settings');
    }
};
