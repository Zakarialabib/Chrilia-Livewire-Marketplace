<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\PhoneController;

use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:ADMIN']], function () {
   
    // Admin Dashboard
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');

    Route::post('/upload', [AdminHomeController::class, 'uploadImages'])->name('upload');

    Route::get('/contact', [AdminHomeController::class, 'contacts'])->name('contact');

    Route::get('/smpt', [AdminHomeController::class, 'smpt'])->name('smpt');

    Route::get('/notification', [AdminHomeController::class, 'notification'])->name('notifications');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    // Sections
    Route::resource('sections', SectionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Pages
    Route::resource('pages', PageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Brands
    Route::resource('brands', BrandController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('phones/{brand_slug}', [PhoneController::class, 'brandDetail'])->name('brands.detail');

    // Phones
    Route::resource('phones', PhoneController::class, ['except' => ['store', 'update', 'destroy']]);

    // Posts
    Route::resource('posts', PostController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // Products
    Route::resource('products', AdminProductController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // Orders
    Route::resource('orders', AdminOrderController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('order-invoice/{id}', [AdminOrderController::class, 'orderInvoice'])->name('orders.invoice');
    
    //POS
    Route::get('pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('pos', [PosController::class, 'store'])->name('pos.store');

    // Payments
    Route::resource('payments', AdminPaymentController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('payment-invoice/{id}', [AdminPaymentController::class, 'paymentInvoice'])->name('payments.invoice');

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);
  
    // Subscriptions
    Route::resource('subscriptions', SubscriptionController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // User Profile
    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    Route::post('settings',  [SettingController::class, 'update'])->name('settings.update');
    
    // Language and Translations
    Route::get('languages', [LanguageController::class, 'index'])->name('languages');
    Route::post('translations/update', [LanguageController::class , 'transUpdate'])->name('translation.update.json');
    Route::post('translations/updateKey', [LanguageController::class, 'transUpdateKey'])->name('translation.update.json.key');
    Route::delete('translations/destroy/{key}', [LanguageController::class, 'destroy'])->name('translations.destroy'); 
    Route::post('translations/create', [LanguageController::class ,'store'])->name('translations.create');
    Route::get('/translations', [AdminHomeController::class, 'translations'])->name('translations');
    
});

Route::get('/language/{locale}', [LanguageController::class , 'changeLanguage'])->name('change_language');