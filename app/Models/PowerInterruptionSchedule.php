<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property string      $title
 * @property string      $status           scheduled | ongoing | resolved
 * @property Carbon      $scheduled_date
 * @property string      $start_time
 * @property string      $end_time
 * @property Carbon|null $end_date
 * @property string|null $expiry_time
 * @property array       $areas            Affected barangay names
 * @property string      $reason
 * @property string|null $image_path
 * @property string|null $image_name
 * @property int         $sort_order
 * @property int|null    $ctrd_user
 * @property int|null    $upd_user
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 * @property-read string $formatted_time
 * @property-read string|null $image_url
 */
class PowerInterruptionSchedule extends Model
{
    protected $fillable = [
        'title',
        'status',
        'scheduled_date',
        'start_time',
        'end_time',
        'end_date',
        'expiry_time',
        'areas',
        'reason',
        'image_path',
        'image_name',
        'sort_order',
        'ctrd_user',
        'upd_user',
    ];

    protected $casts = [
        'scheduled_date' => 'date',
        'end_date'       => 'date',
        'areas'          => 'array',
    ];

    // ── Scopes ────────────────────────────────────────────────

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled');
    }

    public function scopeOngoing($query)
    {
        return $query->where('status', 'ongoing');
    }

    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    // ── Accessors ─────────────────────────────────────────────

    /** Formats a time string, using "NN" for 12:00 noon per Philippine convention. */
    private function formatTime(string $time): string
    {
        $carbon = Carbon::parse($time);

        return $carbon->format('H:i') === '12:00'
            ? '12:00 NN'
            : $carbon->format('g:i A');
    }

    /** Returns the display time range. Appends the end date when it differs from the scheduled date. */
    public function getFormattedTimeAttribute(): string
    {
        $start   = $this->formatTime($this->start_time);
        $end     = $this->formatTime($this->end_time);
        $endDate = $this->end_date ?? $this->scheduled_date;

        if ($endDate->ne($this->scheduled_date)) {
            return "{$start} – {$end} ({$endDate->format('M j')})";
        }

        return "{$start} – {$end}";
    }

    /** Returns the public URL of the uploaded notice image, or null if none. */
    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        $dir      = dirname($this->image_path);
        $filename = rawurlencode(basename($this->image_path));
        $encoded  = ($dir === '.') ? $filename : "{$dir}/{$filename}";

        return asset("storage/{$encoded}");
    }

    // ── Relations ─────────────────────────────────────────────

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'ctrd_user');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'upd_user');
    }
}
