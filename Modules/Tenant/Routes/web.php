<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Tenant\Http\Controllers\TenancyEndNoticeController;
use Modules\Tenant\Http\Controllers\TenantAgreementController;
use Modules\Tenant\Http\Controllers\TenantController;
use Tabuna\Breadcrumbs\Trail;

if (! function_exists('tenantRoutes')) {
    function tenantRoutes($role)
    {
        Route::group(['prefix' => 'tenant', 'as' => 'tenant.'], function () use ($role) {
            Route::get('/', [TenantController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Tenant'), route("{$role}.tenant.index"));
            });
            Route::post('/', [TenantController::class, 'store'])->name('store');

            // Tenant Agreements
            Route::get('/agreements', [TenantAgreementController::class, 'index'])->name('tenantAgreements')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(__('Agreements'), route("{$role}.tenant.tenantAgreements"));
            });

            // Tenancy End Notices
            Route::get('/tenancy-end-notices', [TenancyEndNoticeController::class, 'index'])->name('tenancyEndNotice')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(__('Tenancy End Notice'), route("{$role}.tenant.tenancyEndNotice"));
            });

            Route::get('/download/{type}/{id}/{access_token}', [TenantAgreementController::class, 'savePdf'])->name('savePdf')->breadcrumbs(function (Trail $trail) use ($role) {
                $type = request()->route('type');
                $id = request()->route('id');
                $access_token = request()->route('access_token');
                $trail->parent("{$role}.tenant.index")->push(__('Download'), route("{$role}.tenant.savePdf", compact('type', 'id', 'access_token')));
            });

            Route::group(['prefix' => '{tenant}'], function () use ($role) {
                Route::get('edit', [TenantController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $tenant) use ($role) {
                    $trail->parent("{$role}.tenant.index")->push(__('Editing :tenant', ['tenant' => $tenant->title]), route("{$role}.tenant.edit", $tenant->id));
                });

                Route::patch('/', [TenantController::class, 'update'])->name('update');
                Route::delete('/', [TenantController::class, 'destroy'])->name('destroy');
                Route::post('/make-featured', [TenantController::class, 'makeFeatured'])->name('makeFeatured');
            });
        });
    }
}

Route::domain(config('app.domain'))->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        tenantRoutes('admin');
    });

    Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'manager'], function () {
        tenantRoutes('manager');
    });

    Route::group(['prefix' => 'owner', 'as' => 'owner.', 'middleware' => 'owner'], function () {
        tenantRoutes('owner');
    });

    Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => 'agent'], function () {
        tenantRoutes('agent');
    });

    Route::group(['prefix' => 'tenant', 'as' => 'tenant.'], function () {
        Route::get('/agreement', [TenantAgreementController::class, 'agreementForm'])->name('agreementForm')->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')->push(__('Agreement'), route('tenant.agreementForm'));
        });

        Route::post('/agreement/save', [TenantAgreementController::class, 'store'])->name('agreementForm.save')->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')->push(__('Agreement Form'), route('tenant.agreementForm.save'));
        });

        Route::get('/agreement/{action}/{form_id}/{access_token}', [TenantAgreementController::class, 'viewTenantAgreement'])->name('viewTenantAgreement')->breadcrumbs(function (Trail $trail, $action, $form_id, $access_token) {
            $trail->parent('frontend.index')->push(__('View Agreement'), route('tenant.viewTenantAgreement', ['action' => $action, 'form_id' => $form_id, 'access_token' => $access_token]));
        });

        Route::post('/agreement/image', [TenantAgreementController::class, 'saveSign'])->name('saveSign')->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')->push(__('Save Agreement Image'), route('tenant.saveSign'));
        });
    });
});
