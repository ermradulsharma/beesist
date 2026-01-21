<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\SettingController;
use Tabuna\Breadcrumbs\Trail;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('manager.dashboard'));
});
Route::get('my-subscription', [SubscriptionController::class, 'mySubscription'])->middleware('is_user')->name('mySubscription')->breadcrumbs(function (Trail $trail) {
    $trail->parent('manager.dashboard')->push(__('My Subscription'), route('manager.mySubscription'));
});
Route::get('account', [AccountController::class, 'index'])->name('account')->breadcrumbs(function (Trail $trail) {
    $trail->parent('manager.dashboard')->push(__('My Account'), route('manager.account'));
});

Route::match(['GET', 'POST'], 'terms-condition', [SettingController::class, 'termsCondition'])->name('termsCondition')->breadcrumbs(function (Trail $trail) {
    $trail->parent('manager.dashboard')->push(__('Term & Condition'), route('manager.termsCondition'));
});
Route::match(['GET', 'POST'], 'privacy-policy', [SettingController::class, 'privacyPolicy'])->name('privacyPolicy')->breadcrumbs(function (Trail $trail) {
    $trail->parent('manager.dashboard')->push(__('Privacy Policy'), route('manager.privacyPolicy'));
});

Route::match(['GET', 'POST'], 'general-setting', [SettingController::class, 'generalSetting'])->name('generalSetting')->breadcrumbs(function (Trail $trail) {
    $trail->parent('manager.dashboard')->push(__('General Setting'), route('manager.generalSetting'));
});
