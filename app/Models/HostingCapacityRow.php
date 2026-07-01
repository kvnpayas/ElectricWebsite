<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostingCapacityRow extends Model
{
    protected $fillable = ['type', 'label', 'value', 'is_note', 'sort_order'];

    protected $casts = [
        'is_note'    => 'boolean',
        'sort_order' => 'integer',
    ];
}
