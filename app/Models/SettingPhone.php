<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class SettingPhone extends Model
{
    use LogsActivity;

    protected $fillable = ['number', 'type', 'label', 'is_primary', 'sort_order'];

    protected $casts = ['is_primary' => 'boolean'];

    public function getActivityLabel(): string
    {
        return ($this->label ? "{$this->label}: " : '') . $this->number;
    }
}
