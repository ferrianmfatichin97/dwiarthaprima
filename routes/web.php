<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/contact', 'contact')->name('contact');
});
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', function () { return redirect()->route('admin.dashboard'); });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', AdminProjectController::class)->except(['show']);
    Route::resource('services', AdminServiceController::class)->except(['show']);
    Route::resource('clients', AdminClientController::class)->except(['show']);

    Route::controller(AdminMessageController::class)->group(function () {
        Route::get('messages', 'index')->name('messages.index');
        Route::get('messages/{message}', 'show')->name('messages.show');
        Route::delete('messages/{message}', 'destroy')->name('messages.destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\PageSettingController::class)->group(function () {
        Route::get('pages/home', 'home')->name('pages.home');
        Route::get('pages/project', 'project')->name('pages.project');
        Route::post('pages/{page}', 'store')->name('pages.store');
    });
});
