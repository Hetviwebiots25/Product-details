<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('product.index'); // If logged in, redirect to product listing
    } else {
        return redirect()->route('login'); // If not logged in, redirect to login
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Route for viewing the product listing
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    // Route for creating a new product
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    // Route for storing a new product
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    // Route for editing a product
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

    // Route for updating a product
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

    // Route for viewing a product
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
});
