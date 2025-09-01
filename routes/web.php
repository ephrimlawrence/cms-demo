<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'websites'], function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
    Route::get('/view/{id}', [WebsiteController::class, 'view'])->name('website.view');
    Route::get('/new', [WebsiteController::class, 'new'])->name('website.new');
    Route::post('/create', [WebsiteController::class, 'create'])->name('website.create');
    Route::match(['get', 'post'], '/edit/{id}', [WebsiteController::class, 'edit'])->name('website.edit');
});
