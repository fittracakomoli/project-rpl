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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('/dashboard', function () {
    // Cek role di dalam closure
    if (!auth()->check()) {
        return redirect('/login');
    }
    if (auth()->user()->role === 'admin') {
        return view('admin.dashboard');
    }
    abort(403, 'Unauthorized');
});

Route::get('/eventlist', function() {
    return view('admin.eventlist');
});