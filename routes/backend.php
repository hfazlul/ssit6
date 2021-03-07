<?php
/**
 * Created by PhpStorm.
 * User: exclusive
 * Date: 2/21/2021
 * Time: 11:25 AM
 */

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;


Route::prefix('staff')->name('staff.')->middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::resource('brand', BrandController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);


});
