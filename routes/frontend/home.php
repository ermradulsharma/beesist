<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', [HomeController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('frontend.index'));
});

Route::get('about', [HomeController::class, 'about'])->name('about')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('About'), route('frontend.about'));
});

Route::get('solution', [HomeController::class, 'solution'])->name('solution')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('Solution'), route('frontend.solution'));
});

Route::get('resources', [HomeController::class, 'resources'])->name('resources')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('Resources'), route('frontend.resources'));
});

Route::get('contact', [HomeController::class, 'contact'])->name('contact')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('Contact'), route('frontend.contact'));
});

Route::get('terms', [TermsController::class, 'index'])->name('terms')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('Terms & Conditions'), route('frontend.terms'));
});

Route::get('privacy', [TermsController::class, 'privacy'])->name('privacy')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('Privacy Policy'), route('frontend.privacy'));
});
Route::get('pricing', [SubscriptionController::class, 'index'])->name('subscription')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('Subscription'), route('frontend.subscription'));
});
Route::match(['GET', 'POST'], 'price', [SubscriptionController::class, 'price'])->name('price')->breadcrumbs(function (Trail $trail) {
    $trail->parent('frontend.index')->push(__('Subscription'), route('frontend.price'));
});
Route::post('postimagebase', [HomeController::class, 'saveSign'])->name('postimagebase');
Route::post('upload-media', [HomeController::class, 'uploadEditorMedia'])->name('uploadEditorMedia');
