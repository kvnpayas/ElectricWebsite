<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barangay_areas', function (Blueprint $table) {
            $table->string('barangay_name')->nullable()->after('name')->index();
            $table->dropUnique('barangay_areas_name_unique');
            $table->unique(['barangay_name', 'name']);
        });
    }

    public function down(): void
    {
        Schema::table('barangay_areas', function (Blueprint $table) {
            $table->dropUnique(['barangay_name', 'name']);
            $table->dropColumn('barangay_name');
            $table->unique('name');
        });
    }
};
