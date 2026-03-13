<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\MaterialController;

Route::view('/', 'index')->middleware('guest')->name('login');
Route::post('login', LoginController::class);

Route::middleware('auth')->group(function () {

    Route::post('logout', LogoutController::class)->name('logout');
    Route::get('overview', DashboardController::class)->name('dashboard');

    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('colors', ColorController::class)->except(['show']);
    Route::resource('materials', MaterialController::class)->except(['show']);

    Route::get('products/edit-mode', [ProductController::class, 'index'])
    ->name('products.edit-mode');

});