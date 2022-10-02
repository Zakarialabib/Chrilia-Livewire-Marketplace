<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Vendor\HomeController as VendorHomeController;
use App\Http\Controllers\Vendor\OrderController as VendorOrderController;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;
use App\Http\Controllers\Vendor\SubscriptionController as VendorSubscriptionController;
use App\Http\Controllers\Vendor\UserController as VendorUserController;

Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'middleware' => ['auth', 'role:VENDOR']], function () {

    // Vendor Dashboard
    Route::get('/dashboard', [VendorHomeController::class, 'index'])->name('home');

    // Orders
    Route::resource('orders', VendorOrderController::class, ['except' => ['store', 'update', 'destroy']]);
  
    Route::get('invoice/{id}', [VendorOrderController::class, 'orderInvoice'])->name('orders.invoice');
    
     // Products
    Route::resource('products', VendorProductController::class, ['except' => ['store', 'update', 'destroy']]);
    
    Route::get('product-sync', [VendorProductController::class, 'productSync'])->name('product-sync');
    
    Route::post('product-import', [VendorProductController::class, 'productImport'])->name('product-import');
    
    // User Profile
    Route::resource('profile', VendorUserController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // Routes
    Route::get('/vendor/subscription/show', [VendorSubscriptionController::class, 'show'])->name('subscriptions.show');

});