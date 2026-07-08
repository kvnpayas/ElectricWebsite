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
        Schema::create('power_interruption_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')
                ->constrained('power_interruption_schedules')
                ->cascadeOnDelete();
            $table->string('file_path');
            $table->string('file_name');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('power_interruption_files');
    }
};
