<?php

namespace App\Http\Controllers\Frontend\User;

use Auth;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->roles[0]['name'] ?? 'Undefined';
        return view('frontend.user.dashboard', compact('user', 'role'));
    }
}
