<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class HostingCapacityRow extends Model
{
    use LogsActivity;
    protected $fillable = ['type', 'label', 'value', 'is_note', 'sort_order'];

    protected $casts = [
        'is_note'    => 'boolean',
        'sort_order' => 'integer',
    ];
}



