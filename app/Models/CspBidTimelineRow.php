<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CspBidTimelineRow extends Model
{
    use LogsActivity;
    protected $fillable = ['bid_id', 'label', 'value', 'file_path', 'file_name', 'link_url', 'sort_order'];

    protected $casts = ['sort_order' => 'integer'];

    public function bid(): BelongsTo
    {
        return $this->belongsTo(CspBid::class, 'bid_id');
    }
}



