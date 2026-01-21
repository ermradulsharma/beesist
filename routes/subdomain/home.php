<?php

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Frontend\ManagerController;
use Modules\Property\Entities\Property;
use Modules\Property\Http\Controllers\ShowingController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

/*Route::get('/', [ManagerController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail, $subdomain) {
    $name = User::where(['slug' => $subdomain])->first()->name;
    $trail->push($name, route('frontend.index'));
});*/
Route::get('/', [ManagerController::class, 'propertiesIndex'])->name('dynamic.index');
Route::middleware('cors')->post('/schedule-showing-ajax', [ShowingController::class, 'propertyShowingAjax'])->name('dynamic.propertyShowingAjax');
Route::middleware('cors')->post('/apply-showing', [ShowingController::class, 'applyShowing'])->name('dynamic.applyShowing');
Route::middleware('cors')->post('/ask-question', [ShowingController::class, 'askQuestion'])->name('dynamic.askQuestion');
Route::get('/multiple-schedule', [ShowingController::class, 'scheduleMultiple'])->name('dynamic.scheduleMultiple');

// Property Single Page
Route::group(['prefix' => 'property', 'as' => 'property.'], function ($subdomain) {
    Route::middleware('cors')->post('property-info', [ManagerController::class, 'infoWindow'])->name('dynamic.infoWindow');
    Route::get('{property}', [ManagerController::class, 'singleProperty'])->name('dynamic.single');
});

Route::get('/terms-conditions', [ManagerController::class, 'termsConditions'])->name('dynamic.termsConditions');
Route::get('/privacy-policy', [ManagerController::class, 'privacyPolicy'])->name('dynamic.privacyPolicy');
Route::middleware('cors')->any('/rental-evaluation', [ManagerController::class, 'rentalEvaluation'])->name('dynamic.rentalEvaluation');
