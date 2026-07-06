<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('csp_bid_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained('csp_bids')->cascadeOnDelete();
            $table->enum('type', ['document', 'bid-bulletin'])->default('document');
            $table->string('label', 255);
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $bid1 = DB::table('csp_bids')->where('code', 'TEI-CSP-OT-2025-001')->value('id');
        $bid2 = DB::table('csp_bids')->where('code', 'TEI-CSP-RE-2025-001')->value('id');

        DB::table('csp_bid_documents')->insert([
            // Bid 1 — Documents
            ['bid_id' => $bid1, 'type' => 'document', 'label' => 'Certification of Conformity (DOE-EPIMB-COC-2025-08-008)',                                                                    'sort_order' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'document', 'label' => 'Notification Regarding the Conduct of the Competitive Selection Process [TEI-CSP-OT-2025-001-R1]',                          'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'document', 'label' => 'Invitation to Bid (ITB) – 1st Round [02 September 2025]',                                                                   'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'document', 'label' => 'Expression of Interest (EOI) – 1st Round (02 September 2025)',                                                              'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'document', 'label' => 'Non-Disclosure Undertaking (NDU) – 1st Round (02 September 2025)',                                                          'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Bid 1 — Bid Bulletins
            ['bid_id' => $bid1, 'type' => 'bid-bulletin', 'label' => 'Bid Bulletin No. 01', 'sort_order' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'bid-bulletin', 'label' => 'Bid Bulletin No. 02', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'bid-bulletin', 'label' => 'Bid Bulletin No. 03', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'bid-bulletin', 'label' => 'Bid Bulletin No. 04', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'bid-bulletin', 'label' => 'Bid Bulletin No. 05', 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid1, 'type' => 'bid-bulletin', 'label' => 'Bid Bulletin No. 06', 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Bid 2 — Documents
            ['bid_id' => $bid2, 'type' => 'document', 'label' => 'Notification on Failure of Bidding and Start of 2nd Round of CSP on 28 April 2025', 'sort_order' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'type' => 'document', 'label' => 'Invitation to Bid (ITB) – 2nd Round (28 April 2025)',                                'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'type' => 'document', 'label' => 'Expression of Interest (EOI) – 2nd Round (28 April 2025)',                           'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'type' => 'document', 'label' => 'Non-Disclosure Undertaking (NDU) – 2nd Round (28 April 2025)',                        'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'type' => 'document', 'label' => 'Terms of Reference (TOR) – 2nd Round (28 April 2025)',                               'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['bid_id' => $bid2, 'type' => 'document', 'label' => 'Contract Specifications – 2nd Round (28 April 2025)',                                 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('csp_bid_documents');
    }
};
