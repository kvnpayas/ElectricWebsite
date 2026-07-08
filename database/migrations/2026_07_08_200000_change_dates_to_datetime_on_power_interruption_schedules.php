<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // SQL Server cannot alter a column that has an index — drop first, alter, recreate.
        DB::statement('DROP INDEX IF EXISTS power_interruption_schedules_scheduled_date_index ON power_interruption_schedules');

        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->dateTime('scheduled_date')->change();
            $table->dateTime('expiry_date')->nullable()->change();
        });

        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->index('scheduled_date');
        });
    }

    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS power_interruption_schedules_scheduled_date_index ON power_interruption_schedules');

        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->date('scheduled_date')->change();
            $table->date('expiry_date')->nullable()->change();
        });

        Schema::table('power_interruption_schedules', function (Blueprint $table) {
            $table->index('scheduled_date');
        });
    }
};
