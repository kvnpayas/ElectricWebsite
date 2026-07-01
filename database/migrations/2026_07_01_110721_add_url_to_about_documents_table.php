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
        Schema::table('about_documents', function (Blueprint $table) {
            $table->string('url')->nullable()->unique()->after('file_name')
                ->comment('URL slug for public routing (e.g. annual-report-2025)');
        });
    }

    public function down(): void
    {
        Schema::table('about_documents', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
};
