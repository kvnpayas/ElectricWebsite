<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('csp_bid_timeline_rows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained('csp_bids')->cascadeOnDelete();
            $table->string('label', 100);
            $table->string('value', 200);
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('link_url')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $bid1 = DB::table('csp_bids')->where('code', 'TEI-CSP-OT-2025-001')->value('id');
        $bid2 = DB::table('csp_bids')->where('code', 'TEI-CSP-RE-2025-001')->value('id');

        DB::table('csp_bid_timeline_rows')->insert([
            // Bid 1 timeline (Contract Capacity is handled by capacity_rows + contract_description)
            ['bid_id' => $bid1, 'label' => 'Contract Term',                    'value' => '15 Years',            'sort_order' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'label' => 'Date of Publication',              'value' => '02 September 2025',   'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'label' => '1st Pre-bid Conference',           'value' => '19 September 2025',   'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'label' => '2nd Pre-bid Conference',           'value' => '26 September 2025',   'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'label' => 'Expression of Interest Deadline',  'value' => '23 September 2025',   'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'label' => 'CSP Bid Opening',                  'value' => '21 November 2025',    'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Bid 2 timeline (no capacity table; Contract Capacity is just a label/value row)
            ['bid_id' => $bid2, 'label' => 'Contract Capacity',                'value' => '10,000 kW',           'sort_order' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'label' => 'Contract Term',                    'value' => '10 Years',            'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'label' => 'Date of Publication',              'value' => '28 April 2025',       'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'label' => 'Pre-bid Conference',               'value' => '09 May 2025',         'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'label' => 'Expression of Interest Deadline',  'value' => '15 May 2025',         'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'label' => 'Bid Submission Deadline',          'value' => '24 June 2025',        'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('csp_bid_timeline_rows');
    }
};
