<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('csp_bids', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->enum('status', ['ongoing', 'completed', 'failed'])->default('ongoing');
            $table->string('title');
            $table->date('posted_date');
            $table->text('contract_description')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        DB::table('csp_bids')->insert([
            [
                'code'                 => 'TEI-CSP-OT-2025-001',
                'status'               => 'ongoing',
                'title'                => 'BASELOAD POWER SUPPLY TO THE CAPTIVE MARKET OF TEI',
                'posted_date'          => '2025-09-02',
                'contract_description' => '10MW Supply from 26 December 2026 to 25 December 2041 with escalation in contracted capacity as presented below.',
                'sort_order'           => 0,
                'created_at'           => now(),
                'updated_at'           => now(),
            ],
            [
                'code'                 => 'TEI-CSP-RE-2025-001',
                'status'               => 'failed',
                'title'                => 'SUPPLY OF RENEWABLE ENERGY TO TEI',
                'posted_date'          => '2025-04-28',
                'contract_description' => null,
                'sort_order'           => 1,
                'created_at'           => now(),
                'updated_at'           => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('csp_bids');
    }
};
