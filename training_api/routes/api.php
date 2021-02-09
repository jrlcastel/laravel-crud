<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers', [CustomerController::class, 'getCustomers']);
Route::get('/customer/{id}', [CustomerController::class, 'getCustomerByID']);
Route::post('/customer/add', [CustomerController::class, 'addCustomer']);
Route::put('/customer/update/{id}', [CustomerController::class, 'updateCustomer']);
Route::delete('/customer/delete/{id}', [CustomerController::class, 'deleteCustomer']);

Route::get('/cashiers', [CashierController::class, 'getCashiers']);
Route::get('/cashier/{id}', [CashierController::class, 'getCashierByID']);
Route::post('/cashier/add', [CashierController::class, 'addCashier']);
Route::put('/cashier/update/{id}', [CashierController::class, 'updateCashier']);
Route::delete('/cashier/delete/{id}', [CashierController::class, 'deleteCashier']);

Route::get('/items', [ItemController::class, 'getItems']);
Route::get('/item/{id}', [ItemController::class, 'getItemByID']);
Route::post('/item/add', [ItemController::class, 'addItem']);
Route::put('/item/update/{id}', [ItemController::class, 'updateItem']);
Route::delete('/item/delete/{id}', [ItemController::class, 'deleteItem']);

Route::get('/receipts', [ReceiptController::class, 'getReceipts']);
Route::get('/receipt/{id}', [ReceiptController::class, 'getReceiptByID']);
Route::post('/receipt/add', [ReceiptController::class, 'addReceipt']);
Route::put('/receipt/update/{id}', [ReceiptController::class, 'updateReceipt']);
Route::delete('/receipt/delete/{id}', [ReceiptController::class, 'deleteReceipt']);

Route::get('/sales', [SaleController::class, 'getSales']);
Route::get('/sale/{id}', [SaleController::class, 'getSaleByID']);
Route::post('/sale/add', [SaleController::class, 'addSale']);
Route::put('/sale/update/{id}', [SaleController::class, 'updateSale']);
Route::delete('/sale/delete/{id}', [SaleController::class, 'deleteSale']);