<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication

Route::get('/home', [HomeController::class, 'authentication'])->name('home')->middleware('auth', 'verified');


// Home=================================================================================

Route::get('/', [HomeController::class, 'index']);

Route::get('/product', [HomeController::class, 'product']);

Route::get('/searchProduct', [HomeController::class, 'searchProduct']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

Route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/remove_cartproduct/{id}', [HomeController::class, 'remove_cartproduct']);

Route::get('/cash_order', [HomeController::class, 'cash_order']);

Route::get('/stripe/{total_price}', [HomeController::class, 'stripe']);

Route::post('stripe/{total_price}', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('/show_order', [HomeController::class, 'show_order']);

Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

Route::post('/add_comment', [HomeController::class, 'add_comment']);

Route::post('/add_reply', [HomeController::class, 'add_reply']);

Route::get('/search_product', [HomeController::class, 'search_product']);


// Admin=============================================================================

Route::get('/view_category', [AdminController::class, 'view_category'])->middleware(["auth", "admin"]);

Route::post('/store_category', [AdminController::class, 'store_category'])->middleware(["auth", "admin"]);

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(["auth", "admin"]);

Route::get('/view_product', [AdminController::class, 'view_product'])->middleware(["auth", "admin"]);

Route::post('/store_product', [AdminController::class, 'store_product'])->middleware(["auth", "admin"]);

Route::get('/show_product', [AdminController::class, 'show_product'])->middleware(["auth", "admin"]);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(["auth", "admin"]);

Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(["auth", "admin"]);

Route::post('/update_product/{id}', [AdminController::class, 'update_product'])->middleware(["auth", "admin"]);

Route::get('/view_order', [AdminController::class, 'view_order'])->middleware(["auth", "admin"]);

Route::get('/order_delivered/{id}', [AdminController::class, 'order_delivered'])->middleware(["auth", "admin"]);

Route::get('/print_PDF/{id}', [AdminController::class, 'print_PDF'])->middleware(["auth", "admin"]);

Route::get('/send_email/{id}', [AdminController::class, 'send_email'])->middleware(["auth", "admin"]);

Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email'])->middleware(["auth", "admin"]);

Route::get('/search', [AdminController::class, 'search_data'])->middleware(["auth", "admin"]);
