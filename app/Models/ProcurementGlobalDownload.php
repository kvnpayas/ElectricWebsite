<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class ProcurementGlobalDownload extends Model
{
    use LogsActivity;
    protected $fillable = ['label', 'file_path', 'file_name', 'sort_order'];
}



