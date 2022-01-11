<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;


Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', [ApplicationController::class, 'index'])->name('index');
    Route::any('product-list', [ApplicationController::class, 'productList'])->name('product-list');
    Route::any('cart', [ApplicationController::class, 'cart'])->name('cart');
    Route::any('my-account', [ApplicationController::class, 'myAccount'])->name('my-account');
    Route::any('contact', [ApplicationController::class, 'contact'])->name('contact');
    Route::any('login', [ApplicationController::class, 'login'])->name('login');
});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin-category', "\App\Http\Controllers\Backend\CategoryController");
    Route::any('get-category-child/{cat_parent_id?}', [CategoryController::class, 'index'])->name('get-category-child');
});
