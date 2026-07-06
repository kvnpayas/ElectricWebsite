<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('procurement_opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('code', 60)->unique();
            $table->string('title', 500);
            $table->date('posting_date');
            $table->string('pre_bid_conference', 255)->nullable();
            $table->string('eoi_deadline', 255)->nullable();
            $table->string('bid_submission_deadline', 255)->nullable();
            $table->string('status', 20)->default('ongoing'); // ongoing, awarded, bid_failure, cancelled
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('procurement_opportunity_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opportunity_id')
                ->constrained('procurement_opportunities')
                ->cascadeOnDelete();
            $table->string('label', 255);
            $table->string('file_path', 500)->nullable();
            $table->string('file_name', 255)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        $opportunities = [
            [
                'code'                    => 'TEI-ePROC-2025-003',
                'title'                   => 'ACQUISITION AND INSTALLATION OF ONE (1) UNIT HARMONIC FILTER',
                'posting_date'            => '2025-07-28',
                'pre_bid_conference'      => 'August 7, 2025, 10:30 AM via MS Teams',
                'eoi_deadline'            => 'August 5, 2025, 5:00 PM',
                'bid_submission_deadline' => 'August 22, 2025, 5:00 PM',
                'status'                  => 'awarded',
                'sort_order'              => 1,
            ],
            [
                'code'                    => 'TEI-ePROC-2025-004',
                'title'                   => 'SUPPLY OF STACIR CABLE/AW',
                'posting_date'            => '2025-09-01',
                'pre_bid_conference'      => 'September 11, 2025, 1:30 PM via MS Teams',
                'eoi_deadline'            => 'September 8, 2025, 5:00 PM',
                'bid_submission_deadline' => 'September 25, 2025, 5:00 PM',
                'status'                  => 'bid_failure',
                'sort_order'              => 2,
            ],
            [
                'code'                    => 'TEI-ePROC-2025-012',
                'title'                   => 'SUPPLY OF THREE (3) UNITS 72.5kV DEAD-TANK GAS CIRCUIT BREAKER',
                'posting_date'            => '2025-09-01',
                'pre_bid_conference'      => 'September 18, 2025, 1:30 PM via MS Teams',
                'eoi_deadline'            => 'September 15, 2025, 5:00 PM',
                'bid_submission_deadline' => 'October 09, 2025, 5:00 PM',
                'status'                  => 'awarded',
                'sort_order'              => 3,
            ],
            [
                'code'                    => 'TEI-ePROC-2025-016',
                'title'                   => 'SUPPLY OF STACIR CABLE/AW',
                'posting_date'            => '2025-10-20',
                'pre_bid_conference'      => 'October 29, 2025, 9:30 AM via MS Teams',
                'eoi_deadline'            => 'October 27, 2025, 5:00 PM',
                'bid_submission_deadline' => 'November 12, 2025, 5:00 PM',
                'status'                  => 'awarded',
                'sort_order'              => 4,
            ],
            [
                'code'                    => 'TEI-ePROC-2025-017',
                'title'                   => 'SUPPLY OF 157 UNITS OF 75 FEET SEGMENTED CONCRETE POLE',
                'posting_date'            => '2025-10-20',
                'pre_bid_conference'      => null,
                'eoi_deadline'            => null,
                'bid_submission_deadline' => null,
                'status'                  => 'awarded',
                'sort_order'              => 5,
            ],
        ];

        foreach ($opportunities as $op) {
            $id = DB::table('procurement_opportunities')->insertGetId(array_merge($op, [
                'is_published' => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]));

            DB::table('procurement_opportunity_documents')->insert([
                ['opportunity_id' => $id, 'label' => 'Invitation to Bid (ITB)',    'file_path' => null, 'file_name' => null, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['opportunity_id' => $id, 'label' => 'Terms of Reference (TOR)',   'file_path' => null, 'file_name' => null, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('procurement_opportunity_documents');
        Schema::dropIfExists('procurement_opportunities');
    }
};
