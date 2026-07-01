<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            // null = fall back to end_time on end_date (or scheduled_date) for cron auto-resolve
            $table->time('expiry_time')->nullable()->after('end_date');
        });
    }

    public function down(): void
    {
        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->dropColumn('expiry_time');
        });
    }
};
