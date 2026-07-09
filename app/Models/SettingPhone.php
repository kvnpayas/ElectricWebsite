<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingPhone extends Model
{
    protected $fillable = ['number', 'type', 'label', 'is_primary', 'sort_order'];

    protected $casts = ['is_primary' => 'boolean'];

    public function getActivityLabel(): string
    {
        return ($this->label ? "{$this->label}: " : '') . $this->number;
    }
}
