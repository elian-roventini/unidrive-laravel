<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DealershipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::view('/sobre', 'pages.about-us.index')->name('about.index');

Route::view('/login', 'pages.auth.login')->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('/carro/')->name('car.')->group(function () {
    Route::get('', [CarController::class, 'index'])->name('index');
    Route::post('', [CarController::class, 'store'])->name('store');
    Route::get('{modelo}', [CarController::class, 'show'])->name('show');
});

Route::prefix('/painel/')->name('dashboard.')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
});

Route::prefix('/usuario/')->name('user.')->group(function () {
    Route::view('', 'pages.auth.register.user')->name('create');
    Route::post('', [UserController::class, 'store'])->name('store');
});

Route::prefix('/concessionaria/')->name('dealership.')->group(function () {
    Route::view('', 'pages.auth.register.dealership')->name('create');
    Route::post('', [DealershipController::class, 'store'])->name('store');
});
