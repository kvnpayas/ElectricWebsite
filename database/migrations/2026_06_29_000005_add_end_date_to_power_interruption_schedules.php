<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            // null means "same day as scheduled_date" — cron falls back to scheduled_date
            $table->date('end_date')->nullable()->after('end_time');
        });
    }

    public function down(): void
    {
        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->dropColumn('end_date');
        });
    }
};
