<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class HostingCapacitySetting extends Model
{
    use LogsActivity;
    protected $fillable = ['net_metering_as_of_date', 'der_as_of_date', 'net_metering', 'der_feeder', 'der_substation'];

    protected $casts = [
        'net_metering_as_of_date' => 'date',
        'der_as_of_date'          => 'date',
    ];
}



