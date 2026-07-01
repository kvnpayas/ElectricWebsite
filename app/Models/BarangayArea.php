<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangayArea extends Model
{
    protected $fillable = ['name', 'barangay_name'];

    public static function syncFromNames(array $names, string $barangayName): void
    {
        $unique = array_values(array_unique(array_filter(array_map('trim', $names))));
        foreach ($unique as $name) {
            static::firstOrCreate([
                'barangay_name' => $barangayName,
                'name'          => $name,
            ]);
        }
    }
}
