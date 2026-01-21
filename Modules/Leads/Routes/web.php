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

use Modules\Leads\Http\Controllers\LeadsController;
use Modules\Leads\Http\Controllers\RentalEvaluationController;
use Tabuna\Breadcrumbs\Trail;

if (! function_exists('pmaRoutes')) {
    function pmaRoutes($role)
    {
        Route::prefix('pma')->name('pma.')->group(function () use ($role) {
            Route::get('/', [LeadsController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('PMA'), route("{$role}.pma.index"));
            });
            Route::get('/send-pma', [LeadsController::class, 'sendPMA'])->name('sendPMA')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Send PMA'), route("{$role}.pma.sendPMA"));
            });
            Route::match(['GET', 'POST'], '/add-pma-manually', [LeadsController::class, 'addFormManually'])->name('addFormManually')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Add PMA'), route("{$role}.pma.addFormManually"));
            });
            Route::get('rental-evaluation', [RentalEvaluationController::class, 'index'])->name('rentalRvaluation')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Add PMA'), route("{$role}.pma.rentalRvaluation"));
            });
            Route::get('pma-pdf/{agreementId}', [LeadsController::class, 'pdfFile'])->name('pma-pdf');
            Route::get('edit-pma-manually/{id}', [LeadsController::class, 'editFormManually'])->name('editFormManually');
            Route::post('send-pma-form', [LeadsController::class, 'sendPMAForm'])->name('sendPMAForm');
        });
        Route::group(['prefix' => 'rental-evaluation', 'as' => 'rental_evaluation.'], function () use ($role) {
            Route::get('/', [RentalEvaluationController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Rental Evaluation'), route("{$role}.rental_evaluation.index"));
            });
            Route::match(['GET', 'POST'], 'evaluation-form/{id?}', [RentalEvaluationController::class, 'evaluationForm'])->name('evaluationForm')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Property Rental Evaluation'), route("{$role}.rental_evaluation.evaluationForm"));
            });
        });
    }
}

Route::domain(config('app.domain'))->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        pmaRoutes('admin');
    });

    Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'manager'], function () {
        pmaRoutes('manager');
    });

    Route::group(['prefix' => 'owner', 'as' => 'owner.', 'middleware' => 'owner'], function () {
        pmaRoutes('owner');
    });

    Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => 'agent'], function () {
        pmaRoutes('agent');
    });

    Route::group(['prefix' => 'pma', 'as' => 'pma.'], function () {
        Route::match(['get', 'post'], 'property-info/{account_id}/{user_id}/{id}', [LeadsController::class, 'propertyInfo'])->name('propertyInfo')->breadcrumbs(function (Trail $trail, $account_id, $user_id, $id) {
            $trail->parent('frontend.index')->push(__('Property Management Application'), route('pma.propertyInfo', ['account_id' => $account_id, 'user_id' => $user_id, 'id' => $id]));
        });
        Route::get('register/{account_id}/{userId?}', [LeadsController::class, 'pmaRegisterForm'])->name('pmaRegisterForm');
        Route::post('register', [LeadsController::class, 'pmaRegisterFormSubmit'])->name('pmaRegisterFormSubmit');
        Route::post('store', [LeadsController::class, 'store'])->name('store');
        Route::get('form/{account_id}/{owners?}/{ap?}/{email2?}/{formId?}', [LeadsController::class, 'pmaForm'])->name('form');
        Route::get('agent-form/{account_id}/{formId?}', [LeadsController::class, 'pmaForm'])->name('agentForm');
        Route::get('view-form/{action?}/{form_id?}', [LeadsController::class, 'pmaViewForm'])->name('viewForm');
    });
});
