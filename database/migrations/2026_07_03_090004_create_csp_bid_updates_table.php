<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('csp_bid_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained('csp_bids')->cascadeOnDelete();
            $table->date('update_date');
            $table->string('label', 255);
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $bid1 = DB::table('csp_bids')->where('code', 'TEI-CSP-OT-2025-001')->value('id');

        DB::table('csp_bid_updates')->insert([
            ['bid_id' => $bid1, 'update_date' => '2025-12-26', 'label' => 'Notice of Award',          'sort_order' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'update_date' => '2026-01-06', 'label' => 'Erratum: Notice of Award', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('csp_bid_updates');
    }
};
