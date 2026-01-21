<?php

use App\Domains\Auth\Http\Controllers\Backend\Role\RoleController;
use App\Domains\Auth\Http\Controllers\Backend\User\DeactivatedUserController;
use App\Domains\Auth\Http\Controllers\Backend\User\DeletedUserController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserPasswordController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserSessionController;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'manager.auth'.
Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => config('boilerplate.access.middleware.confirm')], function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::group(['middleware' => 'role:' . config('boilerplate.access.role.agent')], function () {
            Route::get('deleted', [DeletedUserController::class, 'index'])->name('deleted')->breadcrumbs(function (Trail $trail) {
                $trail->parent('agent.auth.user.index')->push(__('Deleted Agents'), route('agent.auth.user.deleted'));
            });
            Route::get('create', [UserController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) {
                $trail->parent('agent.auth.user.index')->push(__('Create Agent'), route('agent.auth.user.create'));
            });
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::group(['prefix' => '{user}'], function () {
                Route::get('edit', [UserController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, User $user) {
                    $trail->parent('agent.auth.user.show', $user)->push(__('Edit'), route('agent.auth.user.edit', $user));
                });

                Route::patch('/', [UserController::class, 'update'])->name('update');
                Route::patch('profile-image', [UserController::class, 'profileImage'])->name('profileImage');
                Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => '{deletedUser}'], function () {
                Route::patch('restore', [DeletedUserController::class, 'update'])->name('restore');
                Route::delete('permanently-delete', [DeletedUserController::class, 'destroy'])->name('permanently-delete');
            });
        });
        Route::group(['middleware' => 'permission:user.access.user.list|user.access.user.deactivate|user.access.user.reactivate|user.access.user.clear-session|user.access.user.impersonate|user.access.user.change-password'], function () {
            Route::get('deactivated', [DeactivatedUserController::class, 'index'])->name('deactivated')->middleware('permission:user.access.user.reactivate')->breadcrumbs(function (Trail $trail) {
                $trail->parent('agent.auth.user.index')->push(__('Deactivated Agents'), route('agent.auth.user.deactivated'));
            });
            Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:user.access.user.list|user.access.user.deactivate|user.access.user.clear-session|user.access.user.impersonate|user.access.user.change-password')->breadcrumbs(function (Trail $trail) {
                $trail->parent('agent.dashboard')->push(__('Agent Management'), route('agent.auth.user.index'));
            });
            Route::group(['prefix' => '{user}'], function () {
                Route::get('/', [UserController::class, 'show'])->name('show')->middleware('permission:user.access.user.list')->breadcrumbs(function (Trail $trail, User $user) {
                    $trail->parent('agent.auth.user.index')->push($user->name, route('agent.auth.user.show', $user));
                });
                Route::patch('mark/{status}', [DeactivatedUserController::class, 'update'])->name('mark')->where(['status' => '[0,1]'])->middleware('permission:user.access.user.deactivate|user.access.user.reactivate');
                Route::post('clear-session', [UserSessionController::class, 'update'])->name('clear-session')->middleware('permission:user.access.user.clear-session');
                Route::get('password/change', [UserPasswordController::class, 'edit'])->name('change-password')->middleware('permission:user.access.user.change-password')->breadcrumbs(function (Trail $trail, User $user) {
                    $trail->parent('agent.auth.user.show', $user)->push(__('Change Password'), route('agent.auth.user.change-password', $user));
                });
                Route::patch('password/change', [UserPasswordController::class, 'update'])->name('change-password.update')->middleware('permission:user.access.user.change-password');
            });
        });
    });
    Route::group(['prefix' => 'role', 'as' => 'role.', 'middleware' => 'role:' . config('boilerplate.access.role.agent')], function () {
        Route::get('/', [RoleController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) {
            $trail->parent('agent.dashboard')->push(__('Role Management'), route('agent.auth.role.index'));
        });
        Route::get('create', [RoleController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) {
            $trail->parent('agent.auth.role.index')->push(__('Create Role'), route('agent.auth.role.create'));
        });
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::group(['prefix' => '{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, Role $role) {
                $trail->parent('agent.auth.role.index')->push(__(':role', ['role' => $role->name]), route('agent.auth.role.edit', $role));
            });
            Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
            Route::patch('/', [RoleController::class, 'update'])->name('update');
        });
    });
});
