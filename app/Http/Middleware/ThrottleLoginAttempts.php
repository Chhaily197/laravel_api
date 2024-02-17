<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ThrottleLoginAttempts
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user && $user->login_attempts >= 3 && $user->last_login_attempt_at->addMinutes(30)->isFuture()){
            return redirect()->back()->with('error', 'Too many login attempts. Please try again after 30 minutes.');
        }
        return $next($request);
    }
}
