<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class SettingEmail extends Model
{
    use LogsActivity;

    protected $fillable = ['address', 'label', 'sort_order'];

    public function getActivityLabel(): string
    {
        return ($this->label ? "{$this->label}: " : '') . $this->address;
    }
}
