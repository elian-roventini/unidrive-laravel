<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home.index')->name('home.index');