<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

Route::domain('{subdomain}.' . config('app.domain'))->group(function () {
    includeRouteFiles(__DIR__ . '/subdomain/');
    /*Route::get('/', function ($subdomain) {
        return "Welcome to the $subdomain subdomain.";
    });*/
});

/*
 * Frontend Routes
 */
// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/*
     * Backend Routes
     *
     * These routes can only be accessed by users with type `admin`
     */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__ . '/backend/');

    Route::get('/clear-cache', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        Artisan::call('route:clear');
        Artisan::call('route:cache');
        Artisan::call('optimize:clear');

        return 'All Clear';
    })->name('clear-cache');

    Route::get('/route-list', function () {
        Artisan::call('route:clear');
        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            echo 'Name: [' . ($route->getName() ?: 'Unnamed') . '] => ' . $route->uri() . '<br>';
        }
    });
});

Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'manager'], function () {
    includeRouteFiles(__DIR__ . '/manager/');
});

Route::group(['prefix' => 'owner', 'as' => 'owner.', 'middleware' => 'owner'], function () {
    includeRouteFiles(__DIR__ . '/owner/');
});

Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => 'agent'], function () {
    includeRouteFiles(__DIR__ . '/agent/');
});
