<?php

use Modules\Cms\Entities\EmailTemplate;
use Modules\Cms\Entities\Page;
use Modules\Cms\Http\Controllers\AnnouncementController;
use Modules\Cms\Http\Controllers\EmailTemplateController;
use Modules\Cms\Http\Controllers\PageController;
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

if (!function_exists('cmsRoutes')) {
    function cmsRoutes($role)
    {
        Route::group(['prefix' => 'page', 'as' => 'page.'], function () use ($role) {
            Route::get('/', [PageController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Pages'), route("{$role}.cms.page.index"));
            });
            Route::get('create', [PageController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.page.index")->push(__('Create Page'), route("{$role}.cms.page.create"));
            });
            Route::post('store', [PageController::class, 'store'])->name('store');
            Route::group(['prefix' => '{page}'], function () use ($role) {
                Route::get('edit', [PageController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $page) use ($role) {
                    $trail->parent("{$role}.cms.page.index")->push(__('Editing :page', ['page' => $page->title]), route("{$role}.cms.page.edit", $page->id));
                });
                Route::patch('/', [PageController::class, 'update'])->name('update');
                Route::delete('/', [PageController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'email-template', 'as' => 'emailTemplate.'], function () use ($role) {
            Route::get('/', [EmailTemplateController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Email Templates'), route("{$role}.cms.emailTemplate.index"));
            });
            Route::get('create', [EmailTemplateController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.emailTemplate.index")->push(__('Create Email Template'), route("{$role}.cms.emailTemplate.create"));
            });
            Route::post('/store', [EmailTemplateController::class, 'store'])->name('store');
            Route::group(['prefix' => '{emailTemplate}'], function () use ($role) {
                Route::get('edit', [EmailTemplateController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $emailTemplateId) use ($role) {
                    $email_template = EmailTemplate::find($emailTemplateId);
                    $trail->parent("{$role}.cms.emailTemplate.index")->push(__('Editing :emailTemplate', ['emailTemplate' => $email_template->title]), route("{$role}.cms.emailTemplate.edit", $emailTemplateId));
                });

                Route::patch('/', [EmailTemplateController::class, 'update'])->name('update');
                Route::delete('/', [EmailTemplateController::class, 'destroy'])->name('destroy');
            })->where('emailTemplate', '[0-9]+');
        });

        Route::group(['prefix' => 'announcement', 'as' => 'announcement.'], function () use ($role) {
            Route::get('/', [AnnouncementController::class, 'index'])->name('index')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(__('Announcement'), route("{$role}.cms.announcement.index"));
            });
            Route::get('create', [AnnouncementController::class, 'create'])->name('create')->breadcrumbs(function (Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.announcement.index")->push(__('Create Announcement'), route("{$role}.cms.announcement.create"));
            });
            Route::post('store', [AnnouncementController::class, 'store'])->name('store');
            Route::group(['prefix' => '{page}'], function () use ($role) {
                Route::get('edit', [AnnouncementController::class, 'edit'])->name('edit')->breadcrumbs(function (Trail $trail, $page) use ($role) {
                    $trail->parent("{$role}.cms.announcement.index")->push(__('Editing :announcement', ['announcement' => $page->title]), route("{$role}.cms.page.edit", $page->id));
                });
                Route::patch('/', [AnnouncementController::class, 'update'])->name('update');
                Route::delete('/', [AnnouncementController::class, 'destroy'])->name('destroy');
            });
        });
    }
}

Route::domain(config('app.domain'))->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
            cmsRoutes('admin');
        });
    });

    // Manager Routes
    Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'manager'], function () {
        Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
            cmsRoutes('admin');
        });
    });

    Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
        Route::get('page/{page}', [PageController::class, 'singlePage'])->name('page.single')->breadcrumbs(function (Trail $trail, $pageSlug) {
            $page = Page::where('slug', $pageSlug)->first();
            $trail->parent('frontend.index')->push(__(':page', ['page' => $page->title]), route('cms.page.single', $page->slug));
        });
    });
});
