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
Route::domain(config('app.domain'))->group(function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::prefix(config('formbuilder.url_path', '/form-builder'))->name('formbuilder::')->group(function () {
            Route::redirect('/', url('admin'.config('formbuilder.url_path', '/form-builder').'/forms'));
            Route::get('/form/{identifier}', 'RenderFormController@render')->name('form.render');
            Route::post('/form/{identifier}', 'RenderFormController@submit')->name('form.submit');
            Route::get('/form/{identifier}/feedback', 'RenderFormController@feedback')->name('form.feedback');
            Route::resource('/my-submissions', 'MySubmissionController');
            Route::name('forms.')->prefix('/forms/{fid}')->group(function () {
                Route::resource('/submissions', 'SubmissionController');
            });
            Route::resource('/forms', 'FormController');
        });
    });
});
// Route::group(['prefix' => 'public'], function () {
//     Route::prefix(config('formbuilder.url_path', '/form-builder'))->name('formbuilder::')->group(function () {
//         Route::post('/form/{identifier}', 'RenderFormController@submit')->name('form.submit');
//     });
// });
