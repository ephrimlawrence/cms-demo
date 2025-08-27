<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'websites'], function () {
    Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('websites.index');
    Route::get('/new', [App\Http\Controllers\WebsiteController::class, 'new'])->name('websites.new');
    Route::post('/create', [App\Http\Controllers\WebsiteController::class, 'create'])->name('websites.create');
});
