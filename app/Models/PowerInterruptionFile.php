<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PowerInterruptionFile extends Model
{
    protected $fillable = ['schedule_id', 'file_path', 'file_name', 'sort_order'];

    public function schedule(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PowerInterruptionSchedule::class, 'schedule_id');
    }

    public function getUrlAttribute(): string
    {
        $dir      = dirname($this->file_path);
        $filename = rawurlencode(basename($this->file_path));
        $encoded  = ($dir === '.') ? $filename : "{$dir}/{$filename}";

        return asset("storage/{$encoded}");
    }
}
