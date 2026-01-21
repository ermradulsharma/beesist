<?php

use Illuminate\Support\Facades\Route;
use Modules\Property\Entities\Building;
use Modules\Property\Entities\Property;
use Modules\Property\Http\Controllers\BuildingController;
use Modules\Property\Http\Controllers\PropertyController;
use Modules\Property\Http\Controllers\RequestBuildingController;
use Modules\Property\Http\Controllers\ShowingController;
use Tabuna\Breadcrumbs\Trail;

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

if (! function_exists('propertyRoutes')) {
    function propertyRoutes($role)
    {
        Route::group(['prefix' => 'properties', 'as' => 'properties.'], function () use ($role) {
            Route::get('/', [PropertyController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Properties'), route("{$role}.properties.index"));
            });
            Route::get('create', [PropertyController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.index")->push(__('Create Property'), route("{$role}.properties.create"));
            });
            Route::post('/', [PropertyController::class, 'store'])->name('store');

            // Performance Report
            Route::get('performance-report', [PropertyController::class, 'performanceReport'])->name('performanceReport')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Performance Report'), route("{$role}.properties.performanceReport"));
            });
            Route::get('sent-performance-report/{pId?}', [PropertyController::class, 'sentPerformanceReport'])->name('sentPerformanceReport')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.performanceReport")->push(__('Sent Report'), route("{$role}.properties.sentPerformanceReport"));
            });
            Route::post('send-performance-report', [PropertyController::class, 'sendPerformanceReport'])->name('sendPerformanceReport');
            // End Performance Report

            Route::group(['prefix' => '{property}'], function () use ($role) {
                Route::get('edit', [PropertyController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $property) use ($role) {
                    $trail->parent("{$role}.properties.index")->push(__(':property', ['property' => $property->title]), route("{$role}.properties.edit", $property->id));
                });
                Route::patch('/', [PropertyController::class, 'update'])->name('update');
                Route::delete('/', [PropertyController::class, 'destroy'])->name('destroy');
                Route::post('/make-featured', [PropertyController::class, 'makeFeatured'])->name('makeFeatured');
            });
            Route::delete('/delete-property-media/{id}', [PropertyController::class, 'removePropertyMedia'])->name('removePropertyMedia');
        });

        // All route for building
        Route::group(['prefix' => 'buildings', 'as' => 'buildings.'], function () use ($role) {
            Route::get('/', [BuildingController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Buildings'), route("{$role}.buildings.index"));
            });

            Route::get('create', [BuildingController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.buildings.index")->push(__('Create Building'), route("{$role}.buildings.create"));
            });

            Route::post('/', [BuildingController::class, 'store'])->name('store');

            Route::post('request', [RequestBuildingController::class, 'store'])->name('requestBuilding');
            Route::get('request-building', [RequestBuildingController::class, 'index'])->name('request');
            Route::get('request-building/{id}', [RequestBuildingController::class, 'edit'])->name('request.edit');
            Route::patch('request-building/{id}', [RequestBuildingController::class, 'update'])->name('request.update');

            Route::group(['prefix' => '{building}'], function () use ($role) {
                Route::get('edit', [BuildingController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $building) use ($role) {
                    $building = Building::find($building);
                    $trail->parent("{$role}.buildings.index")->push(__(':building', ['building' => $building->title]), route("{$role}.buildings.edit", $building->id));
                });
                Route::patch('/', [BuildingController::class, 'update'])->name('update');
                Route::delete('/', [BuildingController::class, 'destroy'])->name('destroy');
            });

            Route::delete('/delete-building-media/{id}', [BuildingController::class, 'removeBuildingMedia'])->name('removeBuildingMedia');
        });

        // All route for Showing
        Route::group(['prefix' => 'showings', 'as' => 'showings.'], function () use ($role) {
            Route::get('/', [ShowingController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Showings'), route("{$role}.showings.index"));
            });
            Route::post('/', [ShowingController::class, 'store'])->name('store');
            Route::get('/scheduled', [ShowingController::class, 'scheduledShowings'])->name('scheduled')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Scheduled Showings'), route("{$role}.showings.scheduled"));
            });
            Route::post('/scheduled/edit/{id}', [ShowingController::class, 'updateScheduledShowings'])->name('scheduledEdit')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Scheduled Showings Edit'), route("{$role}.showings.scheduledEdit"));
            });
            Route::get('/requests/{showingId?}', [ShowingController::class, 'showingRequest'])->name('requests')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Showings Request'), route("{$role}.showings.requests"));
            });
            Route::post('/requests/{id}', [ShowingController::class, 'showingRequestStatus'])->name('requestsStatus')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Showings Request Status'), route("{$role}.showings.requestsStatus"));
            });
            Route::get('/questions', [ShowingController::class, 'askedQuestions'])->name('questions')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Asked Questions'), route("{$role}.showings.questions"));
            });
            Route::get('/schedule-multiple', [ShowingController::class, 'scheduleMultiple'])->name('scheduleMultiple')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Multiple Schedule'), route("{$role}.showings.scheduleMultiple"));
            });
            Route::post('/get-question/{question}', [ShowingController::class, 'getQuestion'])->name('getQuestion');
            Route::post('/answer-question', [ShowingController::class, 'answerQuestion'])->name('answerQuestion');
        });
    }
}

Route::domain(config('app.domain'))->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        propertyRoutes('admin');
    });

    Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'manager'], function () {
        propertyRoutes('manager');
    });

    Route::group(['prefix' => 'owner', 'as' => 'owner.', 'middleware' => 'owner'], function () {
        propertyRoutes('owner');
    });

    Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => 'agent'], function () {
        propertyRoutes('agent');
    });

    Route::group(['prefix' => 'properties', 'as' => 'properties.'], function () {
        Route::get('/', [PropertyController::class, 'propertiesIndex'])->name('index')->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')->push(__('Properties'), route('properties.index'));
        });
        Route::post('/schedule-showing-ajax', [ShowingController::class, 'propertyShowingAjax'])->name('propertyShowingAjax');
        Route::post('/apply-showing', [ShowingController::class, 'applyShowing'])->name('applyShowing');
        Route::post('/ask-question', [ShowingController::class, 'askQuestion'])->name('askQuestion');
        Route::get('/multiple-schedule', [ShowingController::class, 'scheduleMultiple'])->name('scheduleMultiple');
    });

    // Property Single Page
    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::post('property-info', [PropertyController::class, 'infoWindow'])->name('infoWindow');
        Route::get('{property}', [PropertyController::class, 'singleProperty'])->name('single')->breadcrumbs(function (Trail $trail, $property) {
            $property = Property::where('slug', $property)->first();
            $trail->parent('properties.index')->push(__(':property', ['property' => $property->title]), route('property.single', $property->slug));
        });
    });

    Route::group(['prefix' => 'buildings', 'as' => 'buildings.'], function () {
        Route::get('/', [BuildingController::class, 'buildingsIndex'])->name('index')->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')->push(__('Buildings'), route('buildings.index'));
        });
    });

    // Building Single Page
    Route::group(['prefix' => 'building', 'as' => 'building.'], function () {
        Route::post('property-info', [PropertyController::class, 'infoWindow'])->name('infoWindow');
        Route::get('{building}', [BuildingController::class, 'singleProperty'])->name('single')->breadcrumbs(function (Trail $trail, $building) {
            $building = Building::where('slug', $building)->first();
            $trail->parent('buildings.index')->push(__(':building', ['building' => $building->title]), route('building.single', ['building' => $building->slug]));
        });
    });
});
