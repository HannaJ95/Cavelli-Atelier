<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('index');
});

Route::post('login', LoginController::class);
Route::get('/dashboard', DashboardController::class)->middleware('auth');