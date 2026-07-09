<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait LogsActivity
{
    public static function bootLogsActivity(): void
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::$event(function (self $model) use ($event) {
                $userId    = Auth::id();
                $userName  = Auth::user()?->name ?? 'System';
                $type      = class_basename($model);
                $label     = $model->getActivityLabel();
                $ip        = request()->ip();

                ActivityLog::create([
                    'user_id'       => $userId,
                    'user_name'     => $userName,
                    'action'        => $event,
                    'subject_type'  => $type,
                    'subject_id'    => $model->getKey(),
                    'subject_label' => $label,
                    'ip_address'    => $ip,
                ]);

                Log::channel('user-logs')->info(sprintf(
                    '[%s] %s (ID:%s) — %s #%s "%s" from %s',
                    strtoupper($event),
                    $userName,
                    $userId ?? '—',
                    $type,
                    $model->getKey(),
                    $label,
                    $ip
                ));
            });
        }
    }

    public function getActivityLabel(): string
    {
        return (string) ($this->title ?? $this->name ?? $this->label ?? "#{$this->getKey()}");
    }
}
