<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingSocial extends Model
{
    protected $fillable = ['platform', 'url', 'sort_order'];

    public function getActivityLabel(): string
    {
        return "{$this->platform}: {$this->url}";
    }
}
