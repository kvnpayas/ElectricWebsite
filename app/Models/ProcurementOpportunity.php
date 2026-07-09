<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProcurementOpportunity extends Model
{
    use LogsActivity;
    protected $fillable = [
        'code', 'title', 'posting_date',
        'pre_bid_conference', 'eoi_deadline', 'bid_submission_deadline',
        'status', 'is_published', 'sort_order',
    ];

    protected $casts = [
        'posting_date' => 'date',
        'is_published' => 'boolean',
        'sort_order'   => 'integer',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(ProcurementOpportunityDocument::class, 'opportunity_id')->orderBy('sort_order');
    }
}



