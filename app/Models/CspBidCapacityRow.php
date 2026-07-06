<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CspBidCapacityRow extends Model
{
    protected $fillable = ['bid_id', 'period_from', 'period_to', 'capacity_mw', 'sort_order'];

    protected $casts = ['sort_order' => 'integer'];

    public function bid(): BelongsTo
    {
        return $this->belongsTo(CspBid::class, 'bid_id');
    }
}
