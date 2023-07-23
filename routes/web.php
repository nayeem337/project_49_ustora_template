<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/category-products', [HomeController::class, 'categoryProducts'])->name('category-products');
Route::get('/details/{id}', [HomeController::class, 'details'])->name('details');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class, 'create'])->name('category.add');
    Route::post('/new-category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/manage-category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/add-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/new-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/manage-product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
});
