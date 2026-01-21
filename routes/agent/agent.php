<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\User\AccountController;
use Tabuna\Breadcrumbs\Trail;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('agent.dashboard'));
});
Route::get('account', [AccountController::class, 'index'])->name('account')->breadcrumbs(function (Trail $trail) {
    $trail->parent('agent.dashboard')->push(__('My Account'), route('agent.account'));
});
