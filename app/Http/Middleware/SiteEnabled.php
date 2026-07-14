<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SiteEnabled
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        }

        if ($request->is('login') || $request->is('admin/*') || $request->is('livewire/*') || $request->is('up')) {
            return $next($request);
        }

        if (Setting::get('site_enabled', '1') !== '1') {
            return response()->view('maintenance', [], 503);
        }

        return $next($request);
    }
}
