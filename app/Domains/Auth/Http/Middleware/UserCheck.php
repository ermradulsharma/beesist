<?php

namespace App\Domains\Auth\Http\Middleware;

use App\Domains\Auth\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserCheck.
 */
class UserCheck
{
    /**
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->isType(User::TYPE_USER)) {
            if ($user->isManager()) {
                if ($user->subscriptions()->active()->count() > 0) {
                    return $next($request);
                } else {
                    return redirect()->route('frontend.price')->withFlashDanger(__('You do not have any active subscriptions.'));
                }
            } else {
                return $next($request);
            }
        }
        return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
    }
}
