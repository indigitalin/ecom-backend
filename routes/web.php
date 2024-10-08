<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('dashboard');
})->middleware("auth");

Route::get('/dashboard', function(){
    return redirect()->route('admin.index');
})->name('dashboard')->middleware("auth");

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
