<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sites/{slug}', [App\Http\Controllers\WebsiteController::class, 'browseWebsite'])->name('website.browse');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/analytics/{id}', [AnalyticsController::class, 'index'])->name('analytics.index');

    Route::group(['middleware' => 'auth', 'prefix' => 'websites'], function () {
        Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
        Route::get('/view/{id}', [WebsiteController::class, 'view'])->name('website.view');
        Route::get('/new', [WebsiteController::class, 'new'])->name('website.new');
        Route::post('/create', [WebsiteController::class, 'create'])->name('website.create');
        Route::match(['get', 'post'], '/edit/{id}', [WebsiteController::class, 'edit'])->name('website.edit');
    });
});
