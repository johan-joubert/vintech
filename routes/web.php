<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//route admin -by jo-
Route::resource('/admin/product', App\Http\Controllers\ProductController::class);

//route promotion -by jo-
Route::resource('/admin/promotion', App\Http\Controllers\PromotionController::class);


Route::post('/admin/promotion_add_product', [App\Http\Controllers\PromotionController::class, 'addProductPromotion'])->name('addProductPromotion');

