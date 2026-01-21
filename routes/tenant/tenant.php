<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\User\AccountController;
use Tabuna\Breadcrumbs\Trail;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('tenant.dashboard'));
});
Route::get('account', [AccountController::class, 'index'])->name('account')->breadcrumbs(function (Trail $trail) {
    $trail->parent('tenant.dashboard')->push(__('My Account'), route('tenant.account'));
});
