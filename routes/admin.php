<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::view('/profile', 'admin.profile')->name('profile');
    Route::view('/password', 'admin.password')->name('password');
});
