<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('contacts', ContactController::class);

Route::get('about', function () {
    return view('about');
});

Route::resource('products', ProductController::class);
