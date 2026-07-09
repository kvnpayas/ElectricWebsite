<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CspBidUpdate extends Model
{
    use LogsActivity;
    protected $fillable = ['bid_id', 'update_date', 'label', 'file_path', 'file_name', 'sort_order'];

    protected $casts = [
        'update_date' => 'date',
        'sort_order'  => 'integer',
    ];

    public function bid(): BelongsTo
    {
        return $this->belongsTo(CspBid::class, 'bid_id');
    }
}



