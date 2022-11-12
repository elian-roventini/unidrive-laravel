<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::view('/about', 'pages.about-us.index')->name('about.index');

Route::prefix('/car/')->name('car.')->group(function () {
    Route::get('', [CarController::class, 'index'])->name('index');
    Route::post('', [CarController::class, 'store'])->name('store');
    Route::get('{modelo}', [CarController::class, 'show'])->name('show');
});

Route::prefix('/dashboard/')->name('dashboard.')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
});

Route::view('/login', 'pages.auth.login')->name('auth.login');

Route::prefix('/register/')->name('auth.register.')->group(function () {
    Route::view('/usuario', 'pages.auth.register.user')->name('user');
    Route::post('/usuario', [UserController::class, 'store'])->name('user.store');
    Route::view('/concessionaria', 'pages.auth.register.dealership')->name('dealership');
});
