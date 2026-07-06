<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('csp_bid_capacity_rows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained('csp_bids')->cascadeOnDelete();
            $table->string('period_from', 20);
            $table->string('period_to', 20);
            $table->string('capacity_mw', 10);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $bid1 = DB::table('csp_bids')->where('code', 'TEI-CSP-OT-2025-001')->value('id');

        DB::table('csp_bid_capacity_rows')->insert([
            ['bid_id' => $bid1, 'period_from' => '26-Dec-26', 'period_to' => '25-Dec-27', 'capacity_mw' => '10', 'sort_order' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'period_from' => '26-Dec-27', 'period_to' => '25-Dec-28', 'capacity_mw' => '15', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'period_from' => '26-Dec-28', 'period_to' => '25-Dec-31', 'capacity_mw' => '20', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'period_from' => '26-Dec-31', 'period_to' => '25-Dec-41', 'capacity_mw' => '25', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('csp_bid_capacity_rows');
    }
};
