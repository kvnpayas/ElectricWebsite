<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('procurement_global_downloads', function (Blueprint $table) {
            $table->id();
            $table->string('label', 255);
            $table->string('file_path', 500)->nullable();
            $table->string('file_name', 255)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        DB::table('procurement_global_downloads')->insert([
            ['label' => 'Supplier Accreditation Form (SAF)', 'file_path' => null, 'file_name' => null, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['label' => 'Expression of Interest (EOI)',       'file_path' => null, 'file_name' => null, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['label' => 'Non-Disclosure Undertaking (NDU)',   'file_path' => null, 'file_name' => null, 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['label' => 'Data Privacy Consent Form (DPCF)',   'file_path' => null, 'file_name' => null, 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['label' => 'Declaration Form (DF)',              'file_path' => null, 'file_name' => null, 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('procurement_global_downloads');
    }
};
