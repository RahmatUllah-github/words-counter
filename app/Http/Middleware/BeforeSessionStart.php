<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BeforeSessionStart
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
        $cookieName = 'session_lifetime_cookie';
        $sessionLifeTime = config('session.lifetime');
        $value = $request->cookie($cookieName, $sessionLifeTime);
        $lifeTime = (int) $value;

        if ($lifeTime > 0) {
            config()->set('session.lifetime', $lifeTime);
        }

        return $next($request);
    }
}
