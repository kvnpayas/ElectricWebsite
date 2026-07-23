<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hosting_capacity_settings', function (Blueprint $table) {
            $table->date('net_metering_as_of_date')->nullable()->after('as_of_date');
            $table->date('der_as_of_date')->nullable()->after('net_metering_as_of_date');
        });

        // Copy existing single date to both new columns
        DB::table('hosting_capacity_settings')->update([
            'net_metering_as_of_date' => DB::raw('as_of_date'),
            'der_as_of_date'          => DB::raw('as_of_date'),
        ]);

        Schema::table('hosting_capacity_settings', function (Blueprint $table) {
            $table->dropColumn('as_of_date');
        });
    }

    public function down(): void
    {
        Schema::table('hosting_capacity_settings', function (Blueprint $table) {
            $table->date('as_of_date')->nullable()->after('id');
        });

        DB::table('hosting_capacity_settings')->update([
            'as_of_date' => DB::raw('net_metering_as_of_date'),
        ]);

        Schema::table('hosting_capacity_settings', function (Blueprint $table) {
            $table->dropColumn(['net_metering_as_of_date', 'der_as_of_date']);
        });
    }
};
