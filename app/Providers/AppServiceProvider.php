<?php

namespace App\Providers;

use App\Models\ActivityLog;
use App\Models\Setting;
use App\Models\SettingEmail;
use App\Models\SettingPhone;
use App\Models\SettingSocial;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::composer('*', function ($view) {
            static $data = null;

            if ($data === null) {
                try {
                    $data = [
                        'phones'  => SettingPhone::orderByDesc('is_primary')->orderBy('sort_order')->get(),
                        'emails'  => SettingEmail::orderBy('sort_order')->get(),
                        'socials' => SettingSocial::orderBy('sort_order')->get(),
                        'address' => Setting::get('address', ''),
                    ];
                } catch (\Throwable) {
                    $data = ['phones' => collect(), 'emails' => collect(), 'socials' => collect(), 'address' => ''];
                }
            }

            $view->with($data);
        });

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

            Log::channel('user-logs')->info(\sprintf(
                '[LOGIN] %s (ID:%s) from %s',
                $user->name,
                $user->getAuthIdentifier(),
                $ip
            ));
        });
    }
}
