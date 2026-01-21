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

use Modules\RentalApplication\Http\Controllers\RentalApplicationController;
use Modules\RentalApplication\Http\Controllers\ScreeningQuestionController;
use Tabuna\Breadcrumbs\Trail;

if (! function_exists('rentalRoutes')) {
    function rentalRoutes($role)
    {
        Route::group(['prefix' => 'rental-application', 'as' => 'rental_application.'], function () use ($role) {
            Route::get('/', [RentalApplicationController::class, 'rentalApplicationIndex'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Rental Application'), route("{$role}.rental_application.index"));
            });
            Route::get('leasing-application/{id}', [RentalApplicationController::class, 'leasingApplication'])->name('leasingApplication')->breadcrumbs(function (Trail $trail, $id) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(__('Leasing Application'), route("{$role}.rental_application.leasingApplication", ['id' => $id]));
            });
            Route::get('screening-question', [ScreeningQuestionController::class, 'index'])->name('screeningQuestion')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(__('Screening Questions'), route("{$role}.rental_application.screeningQuestion"));
            });

            Route::post('submit-screening-question', [RentalApplicationController::class, 'submitScreeningQuestion'])->name('submitScreeningQuestion');
            Route::post('send-verification/{type}', [RentalApplicationController::class, 'sendRentaApplicationVerification'])->name('sendRentaApplicationVerification');
        });
    }
}

Route::domain(config('app.domain'))->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        rentalRoutes('admin');
    });
    Route::match(['GET', 'POST'], 'screening/{type}/{application_id}', [RentalApplicationController::class, 'screeningRentalApplication'])->name('screeningRentalApplication');
    Route::post('preview', [RentalApplicationController::class, 'preview'])->name('previewApplicationForm');
    Route::group(['middleware' => 'web'], function () {
        Route::match(['get', 'post'], 'apply/{id?}', [RentalApplicationController::class, 'applicationForm'])->name('applicationForm');
        Route::match(['get', 'post'], 'apply/resume/{applicationId}/{propertyId}', [RentalApplicationController::class, 'resumeApply'])->name('resumeApply');
        Route::get('preview/{id?}', [RentalApplicationController::class, 'leasingApplication'])->name('previewApplication');
        Route::post('store', [RentalApplicationController::class, 'store'])->name('rentalApplicationSave');
        Route::post('completed/{id}', function () {
            return view('rentalapplication::completed');
        })->name('rentalApplicationComplete');
    });
    Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'manager'], function () {
        rentalRoutes('manager');
    });

    Route::group(['prefix' => 'owner', 'as' => 'owner.', 'middleware' => 'owner'], function () {
        rentalRoutes('owner');
    });

    Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => 'agent'], function () {
        rentalRoutes('agent');
    });

    Route::group(['prefix' => 'rental-application', 'as' => 'rental_application.'], function () {
        Route::get('/', [RentalApplicationController::class, 'index'])->name('rentalApplication')->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')->push(__('Rental Application'), route('rental_application.rentalApplication'));
        });
        Route::match(['GET', 'POST'], 'screening/{type}/{application_id}', [RentalApplicationController::class, 'screeningRentalApplication'])->name('screeningRentalApplication');
        Route::post('preview', [RentalApplicationController::class, 'preview'])->name('previewApplicationForm');
        Route::group(['middleware' => 'web'], function () {
            Route::match(['get', 'post'], 'apply/{id?}', [RentalApplicationController::class, 'applicationForm'])->name('applicationForm');
            Route::match(['get', 'post'], 'apply/resume/{applicationId}/{propertyId}', [RentalApplicationController::class, 'resumeApply'])->name('resumeApply');
            Route::get('preview/{id?}', [RentalApplicationController::class, 'leasingApplication'])->name('rentalApplicationPreviw');
            Route::post('store', [RentalApplicationController::class, 'store'])->name('rentalApplicationSave');
            Route::post('completed/{id}', function () {
                return view('rentalapplication::completed');
            })->name('rentalApplicationComplete');
        });
        Route::post('submit-rental-application', [RentalApplicationController::class, 'store'])->name('rentalApplicationSubmit');
    });
});
