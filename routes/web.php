<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::resource('products', ProductsController::class);
Route::resource('orders', OrderController::class);

//php artisan make:model BookCategory -crR

//composer require laravel/ui
//php artisan ui bootstrap --auth
//npm run build
//chown -R www-data:www-data /var/www/storage
