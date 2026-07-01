<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hosting_capacity_rows', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['net-metering', 'der-feeder', 'der-substation'])->index();
            $table->string('label');
            $table->string('value');
            $table->boolean('is_note')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed initial data from existing hardcoded blade values
        $now = now();

        // Net Metering — Transformer Rating vs Hosting Capacity
        $nm = [
            ['15', '6'], ['25', '10'], ['37.5', '15'],
            ['50', '20'], ['75', '30'], ['100', '40'],
        ];
        foreach ($nm as $i => [$label, $value]) {
            DB::table('hosting_capacity_rows')->insert([
                'type' => 'net-metering', 'label' => $label, 'value' => $value,
                'is_note' => false, 'sort_order' => $i, 'created_at' => $now, 'updated_at' => $now,
            ]);
        }

        // DER — Per Feeder
        $feeders = [
            ['LIPIEWP', '2,011', false], ['LIPLINE', '4,400', false], ['LIPSSMP', '2,874', false],
            ['LIPIWSPC', '2,569', false], ['LIPSNMGL', '2,200', false], ['LIPHACIENDA', '2,100', false],
            ['SANRAFARMENIA', 'Two (2) embedded plants — 7.1 MW & 2 MW', true],
            ['SANRAFSMBINAUGANAN', '3,024', false], ['SANRAFNORTH', '2,759', false],
            ['SANRAFNORHILLS', '1,200', false], ['SANRAFSOUTH', '2,400', false],
            ['MALGETHA', '1,253', false], ['MALJOSE', '2,016', false],
            ['MALGLOBE', '2,306', false], ['MALAMU', '2,978', false],
            ['PANGHIWAY', '3,400', false], ['PANGSCRUZ', 'One (1) embedded plant — 5.5 MW', true],
            ['PANGNASI', 'Loads → San Vicente FDR1', true],
            ['PANGSANVIC', 'Loads → San Vicente FDR2', true],
            ['PANGPOB', '3,708', false], ['PANGSSV', 'FOR N-1', true],
            ['TPCFDR 1', '2,700', false], ['TPCFDR 2', '2,700', false],
            ['San Vicente FDR1', '2,500', false], ['San Vicente FDR2', '1,100', false],
            ['San Vicente FDR3', '2,400', false], ['San Vicente FDR4', '1,700', false],
            ['San Vicente FDR5', '2,500', false],
        ];
        foreach ($feeders as $i => [$label, $value, $isNote]) {
            DB::table('hosting_capacity_rows')->insert([
                'type' => 'der-feeder', 'label' => $label, 'value' => $value,
                'is_note' => $isNote, 'sort_order' => $i, 'created_at' => $now, 'updated_at' => $now,
            ]);
        }

        // DER — Per Substation
        $substations = [
            ['LIP Substation', '16,154'], ['San Rafael Substation', '9,383'],
            ['Maliwalo Substation', '8,554'], ['Panganiban Substation', '7,108'],
            ['TPC Substation', '5,400'], ['San Vicente Substation', '10,200'],
        ];
        foreach ($substations as $i => [$label, $value]) {
            DB::table('hosting_capacity_rows')->insert([
                'type' => 'der-substation', 'label' => $label, 'value' => $value,
                'is_note' => false, 'sort_order' => $i, 'created_at' => $now, 'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('hosting_capacity_rows');
    }
};
