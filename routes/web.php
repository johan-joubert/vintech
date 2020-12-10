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
    return view('home');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Profile / by Alexis
// Route::resource('profile', App\Http\Controllers\UserController::class);

Route::get('profile/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('profile.show');

Route::put('/profile/edit-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('update.profile');

Route::put('/profile/edit-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update.password');


// Addresses / by Alexis
Route::resource('/profile/billing-address', App\Http\Controllers\BillingAddressController::class);

Route::resource('/profile/delivery-address', App\Http\Controllers\DeliveryAddressController::class);


Auth::routes();