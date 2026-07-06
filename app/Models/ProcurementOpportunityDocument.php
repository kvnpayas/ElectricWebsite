<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProcurementOpportunityDocument extends Model
{
    protected $fillable = ['opportunity_id', 'label', 'file_path', 'file_name', 'sort_order'];

    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(ProcurementOpportunity::class, 'opportunity_id');
    }
}
