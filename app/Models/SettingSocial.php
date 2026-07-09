<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class SettingSocial extends Model
{
    use LogsActivity;

    protected $fillable = ['platform', 'url', 'sort_order'];

    public function getActivityLabel(): string
    {
        return "{$this->platform}: {$this->url}";
    }
}
