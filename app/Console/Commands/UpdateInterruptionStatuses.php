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
        $updated = PowerInterruptionSchedule::whereIn('status', ['scheduled', 'ongoing'])
            ->whereNotNull('expiry_date')
            ->where('expiry_date', '<', Carbon::now())
            ->update(['status' => 'resolved']);

        $this->info("Auto-resolved {$updated} schedule(s).");

        return self::SUCCESS;
    }
}
