<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticated
{
  public function handle(Request $request, Closure $next): mixed
  {
    if (!Auth::check()) {
      if ($request->expectsJson()) {
        return response()->json(['message' => 'Unauthenticated.'], 401);
      }

      return redirect()->route('login')->with('error', 'Please log in to continue.');
    }

    if (Auth::user()->status !== 'Active') {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      if ($request->expectsJson()) {
        return response()->json(['message' => 'Your account has been deactivated.'], 403);
      }

      return redirect()->route('login')->with('error', 'Your account has been deactivated. Please contact the administrator.');
    }

    return $next($request);
  }
}
