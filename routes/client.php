<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\UserController as ClientUserController;

Route::group(['prefix' => 'client', 'as' => 'client.', 'middleware' => ['auth', 'role:CLIENT']], function () {

    // Client Dashboard
    Route::get('/dashboard', [ClientHomeController::class, 'index'])->name('home');

    // Orders
    Route::get('/orders', [ClientHomeController::class, 'order'])->name('orders');
     
    // Profile
    Route::get('/profile', [ClientHomeController::class, 'user'])->name('user');

});