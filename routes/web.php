<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('cms/')->middleware('guest:admin')->group(function () {
    Route::get('{guard}/login', [AuthController::class, 'showLoginView'])->name('cms.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/forgot-password', [ResetPasswordController::class, 'requestPasswordReset'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');

});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {

    Route::resource('admins', AdminController::class);
    Route::resource('markets', MarketController::class);
    Route::resource('products', ProductController::class);
    Route::get('dashboards',  [HomeController::class, 'index'])->name('cms.dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');

    
    // Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');

});

Route::prefix('store-project')->group(function () {
    
    Route::get('/',[ StoreController::class,'index'])->name('store.index');
    Route::get('markets',[ MarketController::class,'index'])->name('frontmarket.index');
    Route::get('products',[ ProductController::class,'index'])->name('frontproduct.index');
    Route::resource('payments', PaymentController::class);



});

// Route::get('/', function () {
//     return view('front.index');
// });
