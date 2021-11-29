<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController as HomePageController;
use App\Http\Controllers\VendorController as HomeVendorController;
use App\Http\Controllers\PostController as HomePostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/terms', [HomeController::class, 'terms'])->name('terms.show');

Route::get('/pages', [HomePageController::class, 'index'])->name('page.index');

Route::get('/page/{slug}', [HomePageController::class, 'show'])->name('page.show');

Route::get('/store/{company_name}', [HomeVendorController::class, 'show'])->name('store.show');

Route::get('/blog', [HomePostController::class, 'index'])->name('blog.index');

Route::get('/blog/{slug}', [HomePostController::class, 'show'])->name('blog.show');

Route::get('/approval', [HomeController::class, 'approval'])->name('auth.approval');

require __DIR__.'/admin.php';
require __DIR__.'/vendor.php';
require __DIR__.'/client.php';
require __DIR__.'/auth.php';
