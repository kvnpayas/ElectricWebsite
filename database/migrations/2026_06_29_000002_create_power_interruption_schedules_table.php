<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('power_interruption_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('status', ['scheduled', 'ongoing', 'resolved'])->default('scheduled')->index();
            $table->date('scheduled_date')->index();
            $table->time('start_time');
            $table->time('end_time');
            $table->json('areas')->comment('Array of affected barangay names');
            $table->text('reason');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->foreignId('ctrd_user')->nullable()->constrained('users')->noActionOnDelete();
            $table->foreignId('upd_user')->nullable()->constrained('users')->noActionOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('power_interruption_schedules');
    }
};
