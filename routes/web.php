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
Route::resource('profile', App\Http\Controllers\UserController::class);

Route::patch('/profile', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update_password');

Route::patch('/profile', [App\Http\Controllers\UserController::class, 'updateDeliveryAddress'])->name('update_delivery_address');

Route::patch('/profile', [App\Http\Controllers\UserController::class, 'updateBillingAddress'])->name('update_billing_address');


Auth::routes();