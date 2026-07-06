<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CspBidDocument extends Model
{
    protected $fillable = ['bid_id', 'type', 'label', 'file_path', 'file_name', 'sort_order'];

    protected $casts = ['sort_order' => 'integer'];

    public function bid(): BelongsTo
    {
        return $this->belongsTo(CspBid::class, 'bid_id');
    }
}
