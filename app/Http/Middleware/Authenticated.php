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

    return $next($request);
  }
}
