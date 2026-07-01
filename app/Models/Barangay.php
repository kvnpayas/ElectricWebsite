<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $name
 */
class Barangay extends Model
{
    protected $fillable = ['name'];

    /** Upsert a list of names, ignoring duplicates. */
    public static function syncFromAreas(array $names): void
    {
        $unique = array_values(array_unique(array_filter(array_map('trim', $names))));

        foreach ($unique as $name) {
            static::firstOrCreate(['name' => $name]);
        }
    }
}
