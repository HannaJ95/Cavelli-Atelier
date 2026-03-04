<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\MaterialController;

Route::view('/', 'index')->name('login');

Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class)->middleware('auth')->name('logout');
Route::get('overview', DashboardController::class)->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
    Route::get('/colors/create', [ColorController::class, 'create'])->name('colors.create');
    Route::post('/colors', [ColorController::class, 'store'])->name('colors.store');
    Route::get('/colors/{color}/edit', [ColorController::class, 'edit'])->name('colors.edit');
    Route::put('/colors/{color}', [ColorController::class, 'update'])->name('colors.update');
    Route::delete('/colors/{color}', [ColorController::class, 'destroy'])->name('colors.destroy');
    
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');
    Route::get('/materials/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');
});