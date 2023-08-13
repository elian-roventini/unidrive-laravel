<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Services\Unidrive\UnidriveService;

class SessionExpired extends UnidriveService
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
        $getUserRequest = $this->api(true)->get('/usuario');

        if (auth()->check() && $getUserRequest->failed()) {
            auth()->logout();

            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
