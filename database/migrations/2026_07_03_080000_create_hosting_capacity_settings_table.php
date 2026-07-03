<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hosting_capacity_settings', function (Blueprint $table) {
            $table->id();
            $table->date('as_of_date')->nullable();
            $table->string('net_metering', 100)->nullable();
            $table->string('der_feeder', 100)->nullable();
            $table->string('der_substation', 100)->nullable();
            $table->timestamps();
        });

        DB::table('hosting_capacity_settings')->insert([
            'as_of_date'     => '2026-03-31',
            'net_metering'   => null,
            'der_feeder'     => null,
            'der_substation' => null,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('hosting_capacity_settings');
    }
};
