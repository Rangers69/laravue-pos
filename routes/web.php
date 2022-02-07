<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);


Route::resource('/customers', App\Http\Controllers\CustomerController::class); 
Route::get('/api/customers', [App\Http\Controllers\CustomerController::class, 'api']);

Route::resource('/suppliers', App\Http\Controllers\SupplierController::class); 
Route::get('/api/suppliers', [App\Http\Controllers\SupplierController::class, 'api']);

Route::resource('/categories', App\Http\Controllers\CategoryController::class); 
Route::get('/api/categories', [App\Http\Controllers\CategoryController::class, 'api']);

Route::resource('/units', App\Http\Controllers\UnitController::class); 
Route::get('/api/units', [App\Http\Controllers\UnitController::class, 'api']);

Route::resource('/items', App\Http\Controllers\ItemController::class); 
Route::get('/api/items', [App\Http\Controllers\ItemController::class, 'api']);

Route::resource('/stocks', App\Http\Controllers\StockController::class); 
Route::get('/api/stocks', [App\Http\Controllers\StockController::class, 'api']);

Route::resource('/transactions', App\Http\Controllers\TransactionController::class); 
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);

Route::resource('/transactionDetails', App\Http\Controllers\TransactionDetailController::class); 
Route::get('/api/transactionDetails', [App\Http\Controllers\TransactionDetailController::class, 'api']);