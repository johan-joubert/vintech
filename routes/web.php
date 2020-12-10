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
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');

Route::get('/admin/update/range/{range}', [App\Http\Controllers\RangeController::class, 'showUpdateRange'])->name('admin.update.range');

Route::get('/admin/update/product/{product}', [App\Http\Controllers\ProductController::class, 'showUpdateProduct'])->name('admin.update.product');

Route::get('/admin/update/promotion/{promotion}', [App\Http\Controllers\PromotionController::class, 'showUpdatePromotion'])->name('admin.update.promotion');



Route::resource('/admin/range', App\Http\Controllers\RangeController::class);

Route::resource('/admin/product', App\Http\Controllers\ProductController::class);

Route::resource('/admin/promotion', App\Http\Controllers\PromotionController::class);



// route add article to promotion -by jo-
Route::post('/admin/promotion_add_product', [App\Http\Controllers\PromotionController::class, 'addProductPromotion'])->name('addProductPromotion');

// route edit article

Route::get('/admin/promotion_show_product', [App\Http\Controllers\ProductController::class, 'showEditProduct'])->name('editProduct');

Route::get('/admin/promotion_edit_product', [App\Http\Controllers\ProductController::class, 'edit'])->name('sendEditProduct');


