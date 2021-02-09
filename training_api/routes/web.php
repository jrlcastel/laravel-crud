<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ReceiptController;

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

Route::get('/', [PageController::class, 'index']);
Route::get('items/', [ItemController::class, 'index']);
Route::get('customers/', [CustomerController::class, 'index']);
Route::get('sales/', [SaleController::class, 'index']);
Route::get('cashiers/', [CashierController::class, 'index']);
Route::get('receipts/', [ReceiptController::class, 'index']);

Route::resource('items', ItemController::class);
Route::resource('customers', CustomerController::class);
Route::resource('sales', SaleController::class);
Route::resource('cashiers', CashierController::class);
Route::resource('receipts', ReceiptController::class);

// Route::get('items/edit', [ItemController::class, 'index']);
// Route::get('items/edit', [ItemController::class, 'index']);
// Route::get('/', 'PageController@index');

// Route::get('/');

// Route::get('', [ItemController::class, 'index']);
// Route::get('/users', 'App\Http\Controllers\UserController@index');
// Route::resource('index', Controller::class);
// Route::resource('/', ItemController::class);
// Route::resource('/create', ItemController::class);
// Route::resource('/index', ItemController::class);
// Route::resource('/edit_item', ItemController::class);
// Route::resource('/create_item', ItemController::class);
// Route::resource('/create', ItemController::class);

// Route::view('items', 'items');
// Route::view('create', 'items');