<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/learning', function () {
    return view('learning');
})->middleware(['auth', 'verified']);

Route::get('/finance', function () {
    return view('finance');
})->middleware(['auth', 'verified']);

Route::get('/consultation', function () {
    return view('consultation');
})->middleware(['auth', 'verified']);

Route::get('/hpp-calculator', function () {
    return view('hpp');
})->middleware(['auth', 'verified']);

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', 'verified']);

Route::get('/community', function () {
    return view('community');
})->middleware(['auth', 'verified']);

Route::get('/learning/detail', function () {
    return view('detail-learning');
})->middleware(['auth', 'verified']);

Route::get('/setting', function () {
    return view('setting');
})->middleware(['auth', 'verified']);

Route::get('/subscription', function () {
    return view('subscription');
})->middleware(['auth', 'verified']);

Route::get('/recipes', function () {
    return view('recipe');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
