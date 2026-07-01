<?php

namespace App\Console\Commands;

use App\Models\PowerInterruptionSchedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateInterruptionStatuses extends Command
{
    protected $signature   = 'schedules:update-status';
    protected $description = 'Auto-update power interruption statuses based on scheduled date and time.';

    public function handle(): int
    {
        $now     = Carbon::now();
        $updated = 0;

        PowerInterruptionSchedule::whereIn('status', ['scheduled', 'ongoing'])->each(function ($schedule) use ($now, &$updated) {
            $startDate   = $schedule->scheduled_date->format('Y-m-d');
            $expiryDate  = ($schedule->end_date ?? $schedule->scheduled_date)->format('Y-m-d');
            $expiryTime  = $schedule->expiry_time ?? $schedule->end_time;
            $start       = Carbon::parse("{$startDate} {$schedule->start_time}");
            $end         = Carbon::parse("{$expiryDate} {$expiryTime}");

            $newStatus = match (true) {
                $now->lt($start)                    => 'scheduled',
                $now->gte($start) && $now->lt($end) => 'ongoing',
                default                             => 'resolved',
            };

            if ($newStatus !== $schedule->status) {
                $schedule->update(['status' => $newStatus]);
                $updated++;
            }
        });

        $this->info("Updated {$updated} schedule(s).");

        return self::SUCCESS;
    }
}
