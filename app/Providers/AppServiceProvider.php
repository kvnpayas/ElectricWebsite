<?php

namespace App\Providers;

use App\Models\ActivityLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Event::listen(Login::class, function (Login $event) {
            /** @var \App\Models\User $user */
            $user = $event->user;
            $ip   = request()->ip();

            ActivityLog::create([
                'user_id'    => $user->getAuthIdentifier(),
                'user_name'  => $user->name,
                'action'     => 'login',
                'ip_address' => $ip,
            ]);

            Log::channel('user-logs')->info(sprintf(
                '[LOGIN] %s (ID:%s) from %s',
                $user->name,
                $user->getAuthIdentifier(),
                $ip
            ));
        });
    }
}
