<?php

// namespace App\Http\Middleware;

namespace App\Domains\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerCheck
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
        if ($request->user() && $request->user()->hasRole('Property Manager')) {
            if ($request->user()->subscriptions()->active()->count() > 0) {
                return $next($request);
            } else {
                return redirect()->route('frontend.price')->withFlashDanger(__('You do not have any active subscriptions.'));
            }
        }

        return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
    }
}
