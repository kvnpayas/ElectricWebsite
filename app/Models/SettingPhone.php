<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class SettingPhone extends Model
{
    use LogsActivity;

    protected $fillable = ['number', 'type', 'label', 'is_primary', 'sort_order'];

    protected $casts = ['is_primary' => 'boolean'];

    public function getTelAttribute(): string
    {
        $digits = preg_replace('/[^0-9]/', '', $this->number);
        if (str_starts_with($digits, '0')) {
            $digits = '+63' . substr($digits, 1);
        }
        return 'tel:' . $digits;
    }

    public function getActivityLabel(): string
    {
        return ($this->label ? "{$this->label}: " : '') . $this->number;
    }
}
