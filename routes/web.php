<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home.index')->name('home.index');
Route::view('/login', 'pages.auth.login')->name('auth.login');
Route::view('/registrar/usuario', 'pages.auth.register.user')->name('auth.register.user');
Route::view('/registrar/concessionaria', 'pages.auth.register.dealership')->name('auth.register.dealership');
Route::view('/carros', 'pages.cars.index')->name('cars.index');
