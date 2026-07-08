<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property string      $title
 * @property string      $status           scheduled | ongoing | resolved
 * @property Carbon      $scheduled_date
 * @property Carbon|null $expiry_date
 * @property string      $reason
 * @property int         $sort_order
 * @property int|null    $ctrd_user
 * @property int|null    $upd_user
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class PowerInterruptionSchedule extends Model
{
    protected $fillable = [
        'title',
        'status',
        'scheduled_date',
        'expiry_date',
        'reason',
        'sort_order',
        'ctrd_user',
        'upd_user',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
        'expiry_date'    => 'datetime',
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

    // ── Relations ─────────────────────────────────────────────

    public function files(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PowerInterruptionFile::class, 'schedule_id')->orderBy('sort_order');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'ctrd_user');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'upd_user');
    }
}
