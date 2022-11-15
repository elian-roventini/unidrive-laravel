<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DealershipController;
use App\Http\Controllers\ScheduleController;
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

Route::prefix('/agendamento/')->name('schedule.')->group(function () {
    Route::post('', [ScheduleController::class, 'store'])->name('store');
});

Route::prefix('/painel/')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
});

Route::prefix('/usuario/')->name('user.')->group(function () {
    Route::view('', 'pages.user.create')->name('create');
    Route::post('', [UserController::class, 'store'])->name('store');
});

Route::prefix('/concessionaria/')->name('dealership.')->group(function () {
    Route::view('', 'pages.dealership.create')->name('create');
    Route::post('', [DealershipController::class, 'store'])->name('store');
});
