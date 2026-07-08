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
        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->dropColumn([
                'start_time', 'end_time', 'end_date', 'expiry_time',
                'areas', 'image_path', 'image_name',
            ]);
            $table->date('expiry_date')->nullable()->after('scheduled_date');
        });
    }

    public function down(): void
    {
        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->dropColumn('expiry_date');
            $table->string('title')->default('Scheduled Power Interruption');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->date('end_date')->nullable();
            $table->time('expiry_time')->nullable();
            $table->json('areas')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
        });
    }
};
