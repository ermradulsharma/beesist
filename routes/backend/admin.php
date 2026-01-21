<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::post('upload-media', [DashboardController::class, 'uploadEditorMedia'])->name('uploadEditorMedia');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.dashboard'));
});
Route::get('account', [AccountController::class, 'index'])->name('account')->breadcrumbs(function (Trail $trail) {
    $trail->parent('admin.dashboard')->push(__('My Account'), route('admin.account'));
});
Route::match(['GET', 'POST'], 'terms-condition', [SettingController::class, 'termsCondition'])->name('termsCondition')->breadcrumbs(function (Trail $trail) {
    $trail->parent('admin.dashboard')->push(__('Term & Condition'), route('admin.termsCondition'));
});
Route::match(['GET', 'POST'], 'privacy-policy', [SettingController::class, 'privacyPolicy'])->name('privacyPolicy')->breadcrumbs(function (Trail $trail) {
    $trail->parent('admin.dashboard')->push(__('Privacy Policy'), route('admin.privacyPolicy'));
});

// Subscription Package
Route::group(['prefix' => 'subscription', 'as' => 'subscription.'], function () {
    Route::get('/', [SubscriptionController::class, 'subscribe'])->name('subscribe')->breadcrumbs(function (Trail $trail) {
        $trail->parent('admin.dashboard')->push(__('Subscription'), route('admin.subscription.subscribe'));
    });
    Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.subscription.subscribe')->push(__('Service'), route('admin.subscription.services.index'));
        });
        Route::get('create', [ServiceController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.subscription.services.index')->push(__('Create Service'), route('admin.subscription.services.create'));
        });
        Route::post('store', [ServiceController::class, 'store'])->name('store');
        Route::get('{service}/edit', [ServiceController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $service) {
            $trail->parent('admin.subscription.services.index', $service)->push(__('Edit :service', ['service' => $service->title]), route('admin.subscription.services.edit', $service));
        });
        Route::put('{service}', [ServiceController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'packages', 'as' => 'packages.'], function () {
        Route::get('/', [PackageController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.subscription.subscribe')->push(__('Package'), route('admin.subscription.packages.index'));
        });
        Route::get('create', [PackageController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.subscription.packages.index')->push(__('Create Package'), route('admin.subscription.packages.create'));
        });
        Route::post('store', [PackageController::class, 'store'])->name('store');
        Route::get('{package}/edit', [PackageController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $package) {
            $trail->parent('admin.subscription.packages.index', $package)->push(__('Edit :package', ['package' => $package->title]), route('admin.subscription.packages.edit', $package));
        });
        Route::put('{package}', [PackageController::class, 'update'])->name('update');
    });
});
