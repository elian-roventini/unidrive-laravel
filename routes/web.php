<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::view('/about', 'pages.about-us.index')->name('about.index');
Route::view('/login', 'pages.auth.login')->name('auth.login');
Route::view('/registrar/usuario', 'pages.auth.register.user')->name('auth.register.user');
Route::view('/registrar/concessionaria', 'pages.auth.register.dealership')->name('auth.register.dealership');
