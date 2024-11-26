<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('contacts', ContactController::class);

Route::get('about', function () {
    return view('about');
});

Route::resource('products', ProductController::class);

Route::resource('transactions', TransactionController::class);

Route::resource('customers', CustomerController::class);
