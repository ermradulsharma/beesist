<?php

use App\Domains\Auth\Http\Controllers\Backend\User\UserController;

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => config('boilerplate.access.middleware.confirm')], function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::group(['middleware' => 'role:' . config('boilerplate.access.role.owner')], function () {
            Route::group(['prefix' => '{user}'], function () {
                Route::patch('profile-image', [UserController::class, 'profileImage'])->name('profileImage');
            });
        });
    });
});
