<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingEmail extends Model
{
    protected $fillable = ['address', 'label', 'sort_order'];

    public function getActivityLabel(): string
    {
        return ($this->label ? "{$this->label}: " : '') . $this->address;
    }
}
