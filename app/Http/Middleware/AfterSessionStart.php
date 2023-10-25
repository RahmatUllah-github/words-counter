<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AfterSessionStart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        $cookieName = 'session_lifetime_cookie';
        $value = $request->cookie($cookieName, 0);
        $oldLifeTime = (int) $value;

        if ($user) {
            $newLifeTime = (int) $user->session_time;

            // Only add the cookie to the response if it doesn't already exist
            // OR if the lifetime value is changed
            if ($oldLifeTime === 0 || $oldLifeTime !== $newLifeTime) {
                Cookie::queue(Cookie::forever($cookieName, $newLifeTime));
            }
        } else {
            // Only forgot the cookie if it exists
            if ($oldLifeTime > 0) {
                Cookie::queue(Cookie::forget($cookieName));
            }
        }

        return $next($request);
    }
}
