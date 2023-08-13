<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Services\Unidrive\UnidriveService;

class SessionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $isLoggedIn = $request->path() !== 'dashboard/logout';
        if (
            $isLoggedIn &&
            (new UnidriveService())->api(true)->get('/usuario')->failed()
        ) {
            auth()->logout();

            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
