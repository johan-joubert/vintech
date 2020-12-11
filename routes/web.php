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


//admin's route ressource range,product,promotion -by jo-
Route::resource('/admin/range', App\Http\Controllers\RangeController::class);

Route::resource('/admin/product', App\Http\Controllers\ProductController::class);

Route::resource('/admin/promotion', App\Http\Controllers\PromotionController::class);


//admin's custome route admin -by jo-
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');

Route::get('/admin/update/range/{range}', [App\Http\Controllers\RangeController::class, 'showUpdateRange'])->name('admin.update.range');

Route::get('/admin/update/product/{product}', [App\Http\Controllers\ProductController::class, 'showUpdateProduct'])->name('admin.update.product');

Route::get('/admin/update/promotion/{promotion}', [App\Http\Controllers\PromotionController::class, 'showUpdatePromotion'])->name('admin.update.promotion');


//admin's route add article to promotion -by jo-
Route::post('/admin/promotion_add_product', [App\Http\Controllers\PromotionController::class, 'addProductPromotion'])->name('addProductPromotion');


//admin's route edit article
Route::get('/admin/promotion_show_product', [App\Http\Controllers\ProductController::class, 'showEditProduct'])->name('editProduct');

Route::get('/admin/promotion_edit_product', [App\Http\Controllers\ProductController::class, 'edit'])->name('sendEditProduct');


// route cart -by jo-
Route::get('cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');

Route::post('cart/add/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::get('cart/remove/{product}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.show');

Route::get('cart/empty', [App\Http\Controllers\CartController::class, 'empty'])->name('cart.empty');


