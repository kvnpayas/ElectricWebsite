<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostingCapacitySetting extends Model
{
    protected $fillable = ['as_of_date', 'net_metering', 'der_feeder', 'der_substation'];

    protected $casts = [
        'as_of_date' => 'date',
    ];
}
