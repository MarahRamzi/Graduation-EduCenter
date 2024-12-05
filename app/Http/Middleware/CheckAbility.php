<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAbility
{
    public function handle($request, Closure $next, $ability)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user && $user->hasAbility($ability)) {
                return $next($request);
            }
            return redirect('not_allowed');
        }
        return redirect('not_allowed');
    }
}
