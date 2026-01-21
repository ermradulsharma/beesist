<?php

namespace App\Domains\Auth\Http\Middleware;

use Closure;

/**
 * Class SuperAdminCheck.
 */
class SuperAdminCheck
{
    /**
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->hasAllAccess()) {
            return $next($request);
        }

        return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
    }
}
