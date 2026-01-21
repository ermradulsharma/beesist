<?php

namespace App\Domains\Auth\Http\Middleware;

use Closure;

/**
 * Class ToBeLoggedOut.
 */
class ToBeLoggedOut
{
    /**
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->to_be_logged_out) {
            $request->user()->update(['to_be_logged_out' => false]);
            session()->flush();
            auth()->logout();

            return redirect()->route('frontend.auth.login');
        }

        return $next($request);
    }
}
