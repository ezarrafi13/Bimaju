<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/learning', function () {
    return view('learning');
});

Route::get('/finance', function () {
    return view('finance');
});

Route::get('/consultation', function () {
    return view('consultation');
});

Route::get('/hpp-calculator', function () {
    return view('hpp');
});

Route::get('/profiles', function () {
    return view('profiles');
});

Route::get('/community', function () {
    return view('community');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
