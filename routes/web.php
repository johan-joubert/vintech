<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Range;
use App\Models\User;


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
    $products = Product::all();
    $promotions = Promotion::all();
    $ranges = Range::all();
    $users = User::all();
    return view('home', ['products' => $products, 'promotions' => $promotions, 'ranges' => $ranges, 'users' => $users]);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin's route ressource range,product,promotion -by jo-
Route::resource('/admin/range', App\Http\Controllers\RangeController::class);

Route::resource('/admin/product', App\Http\Controllers\ProductController::class);

Route::resource('/admin/promotion', App\Http\Controllers\PromotionController::class);


//admin's custome route admin -by jo-
//ADMIN -by jo-
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');

Route::get('/admin/update/range/{range}', [App\Http\Controllers\RangeController::class, 'showUpdateRange'])->name('admin.update.range');

Route::get('/range/{range}', [App\Http\Controllers\RangeController::class, 'show'])->name('show.range');

Route::get('/admin/update/product/{product}', [App\Http\Controllers\ProductController::class, 'showUpdateProduct'])->name('admin.update.product');

Route::get('/admin/update/promotion/{promotion}', [App\Http\Controllers\PromotionController::class, 'showUpdatePromotion'])->name('admin.update.promotion');


//admin's route add article to promotion -by jo-
Route::post('/admin/promotion_add_product', [App\Http\Controllers\PromotionController::class, 'addProductPromotion'])->name('addProductPromotion');

Route::resource('/admin/range', App\Http\Controllers\RangeController::class);

Route::resource('/admin/product', App\Http\Controllers\ProductController::class);

//admin's route edit article
Route::get('/admin/promotion_show_product', [App\Http\Controllers\ProductController::class, 'showEditProduct'])->name('editProduct');

Route::get('/admin/promotion_edit_product', [App\Http\Controllers\ProductController::class, 'edit'])->name('sendEditProduct');


// route cart -by jo-
Route::get('cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');

Route::post('cart/add/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::get('cart/remove/{product}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
// route add article to promotion -by jo-
Route::post('/admin/promotion_add_product', [App\Http\Controllers\PromotionController::class, 'addProductPromotion'])->name('addProductPromotion');

// route edit article
Route::get('/admin/promotion_show_product', [App\Http\Controllers\ProductController::class, 'showEditProduct'])->name('editProduct');

Route::get('cart/empty', [App\Http\Controllers\CartController::class, 'empty'])->name('cart.empty');



// PROFILE / by Alexis
// Route::resource('profile', App\Http\Controllers\UserController::class);

Route::get('profile/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('profile.show');

Route::put('/profile/edit-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('update.profile');

Route::put('/profile/edit-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update.password');

// Addresses / by Alexis
Route::resource('/profile/billing-address', App\Http\Controllers\BillingAddressController::class);

Route::resource('/profile/delivery-address', App\Http\Controllers\DeliveryAddressController::class);

// Orders / by Alexis
Route::resource('orders', App\Http\Controllers\OrderController::class);


// CONFIRM_CART / by Alexis
Route::resource('confirm_cart', App\Http\Controllers\ConfirmCartController::class);

Route::post('confirm_cart', [App\Http\Controllers\ConfirmCartController::class, 'deliveryChoice'])->name('delivery.choice');

Auth::routes();

// FAVORITES / by Flo
Route::resource('/favorites', App\Http\Controllers\FavoriteController::class);