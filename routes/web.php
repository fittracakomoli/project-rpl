<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tickets', function () {
    return view('tickets');
});

Route::get('/cart', function () {
    return view('cart');
});