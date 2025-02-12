<?php

use App\Livewire\Posts;
use App\Livewire\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/posts', Posts::class)->middleware('auth')->name('posts');
Route::get('/products', Products::class)->middleware('auth')->name('products');
