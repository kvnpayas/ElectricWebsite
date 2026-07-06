<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcurementGlobalDownload extends Model
{
    protected $fillable = ['label', 'file_path', 'file_name', 'sort_order'];
}
