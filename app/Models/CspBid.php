<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CspBid extends Model
{
    protected $fillable = ['code', 'status', 'title', 'posted_date', 'contract_description', 'sort_order', 'is_published'];

    protected $casts = [
        'posted_date'  => 'date',
        'sort_order'   => 'integer',
        'is_published' => 'boolean',
    ];

    public function capacityRows(): HasMany
    {
        return $this->hasMany(CspBidCapacityRow::class, 'bid_id')->orderBy('sort_order');
    }

    public function timelineRows(): HasMany
    {
        return $this->hasMany(CspBidTimelineRow::class, 'bid_id')->orderBy('sort_order');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(CspBidDocument::class, 'bid_id')
            ->where('type', 'document')
            ->orderBy('sort_order');
    }

    public function bidBulletins(): HasMany
    {
        return $this->hasMany(CspBidDocument::class, 'bid_id')
            ->where('type', 'bid-bulletin')
            ->orderBy('sort_order');
    }

    public function updates(): HasMany
    {
        return $this->hasMany(CspBidUpdate::class, 'bid_id')->orderBy('sort_order');
    }
}
