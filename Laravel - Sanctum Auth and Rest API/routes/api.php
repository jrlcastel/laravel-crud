<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Auth\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth::routes();

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('register', function(Request $request) {
//     $user = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => bcrypt($request->password)
//     ]);

//     return $user;
// });

// Route::post('/login', [LoginController::class, 'nuxtLogin']);

Route::post('/sanctum/token', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
// Route::get('/validToken', [LoginController::class, 'isLoggedIn'])->middleware('auth:sanctum');


// Route::post('login', function(Request $request) {
//     $credentials = $request->only('email', 'password');

//     if(! auth()->attempt($credentials)) {
//         throw ValidationException::withMessages([
//             'email' => 'Invalid credentials'
//         ]);
//     }

//     $request->session()->regenerate();
//     return response()->json(null, 201);
// });

// Route::post('logout', function(Request $request) {

//     auth()->guard('web')->logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();

//     return response()->json(null, 200);
// });

// Route::post('login', function(Request $request) {
//     $credentials = $request->only('email', 'password');

//     if(! auth()->attempt($credentials)) {
//         throw ValidationException::withMessages([
//             'email' => 'Invalid credentials'
//         ]);
//     }

//     $request->session()->regenerate();
//     return response()->json(null, 201);
// });

// Route::post('logout', function(Request $request) {

//     auth()->guard('web')->logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();

//     return response()->json(null, 200);
// });

Route::get('/customers', [CustomerController::class, 'getCustomers'])->middleware('auth:sanctum');
Route::get('/nuxtCustomers', [CustomerController::class, 'getCustomers']);
Route::get('/customer/{id}', [CustomerController::class, 'getCustomerByID']);
Route::post('/customer/add', [CustomerController::class, 'addCustomer']);
Route::put('/customer/update/{id}', [CustomerController::class, 'updateCustomer']);
Route::delete('/customer/delete/{id}', [CustomerController::class, 'deleteCustomer']);

Route::get('/cashiers', [CashierController::class, 'getCashiers'])->middleware('auth:sanctum');
Route::get('/nuxtCashiers', [CashierController::class, 'getCashiers']);
Route::get('/cashier/{id}', [CashierController::class, 'getCashierByID']);
Route::post('/cashier/add', [CashierController::class, 'addCashier']);
Route::put('/cashier/update/{id}', [CashierController::class, 'updateCashier']);
Route::delete('/cashier/delete/{id}', [CashierController::class, 'deleteCashier']);

Route::get('/items', [ItemController::class, 'getItems'])->middleware('auth:sanctum');
Route::get('/nuxtItems', [ItemController::class, 'getItems']);
Route::get('/item/{id}', [ItemController::class, 'getItemByID']);
Route::post('/item/add', [ItemController::class, 'addItem']);
Route::put('/item/update/{id}', [ItemController::class, 'updateItem']);
Route::delete('/item/delete/{id}', [ItemController::class, 'deleteItem']);

Route::get('/receipts', [ReceiptController::class, 'getReceipts'])->middleware('auth:sanctum');
Route::get('/nuxtReceipts', [ReceiptController::class, 'getReceipts']);
Route::get('/receipt/{id}', [ReceiptController::class, 'getReceiptByID']);
Route::post('/receipt/add', [ReceiptController::class, 'addReceipt']);
Route::put('/receipt/update/{id}', [ReceiptController::class, 'updateReceipt']);
Route::delete('/receipt/delete/{id}', [ReceiptController::class, 'deleteReceipt']);

Route::get('/sales', [SaleController::class, 'getSales'])->middleware('auth:sanctum');
Route::get('/nuxtSales', [SaleController::class, 'getSales']);
Route::get('/sale/{id}', [SaleController::class, 'getSaleByID']);
Route::post('/sale/add', [SaleController::class, 'addSale']);
Route::put('/sale/update/{id}', [SaleController::class, 'updateSale']);
Route::delete('/sale/delete/{id}', [SaleController::class, 'deleteSale']);