<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', \App\Livewire\Admin\Dashboard::class)->name('index');
    Route::get('/profile', \App\Livewire\Admin\Profile::class)->name('profile');
    Route::get('/password', \App\Livewire\Admin\Password::class)->name('password');

    // Route::get('/products', \App\Livewire\Admin\Product::class)->name('products.index');
    Route::get('/users', \App\Livewire\Admin\User::class)->name('users.index');
    Route::get('/clients', \App\Livewire\Admin\Clients::class)->name('clients.index');
    Route::get('products', \App\Livewire\Admin\Products\ProductList::class)->name('products');
});
