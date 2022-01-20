<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Transaction_CashierController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::middleware(['auth', 'checkrole'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
    Route::get('/ubahprofile', [ProfileController::class, 'editview'])->middleware('auth');
    Route::post('/editprofile', [ProfileController::class, 'edit'])->middleware('auth');
    Route::get('/cashier', [CashierController::class, 'index'])->middleware('auth');
    Route::get('/cashier/add', [CashierController::class, 'addview'])->middleware('auth');
    Route::post('/addcashier', [CashierController::class, 'add_Cashier'])->middleware('auth');
    Route::post('/deleteUser/{id}', [CashierController::class, 'destroy'])->middleware('auth');
    Route::get('/editCashier', [CashierController::class, 'editview'])->middleware('auth');
    Route::post('/editCashier', [CashierController::class, 'edit'])->middleware('auth');
    Route::get('/transaction', [TransactionController::class, 'index'])->middleware('auth');
    Route::get('/stock', [StockController::class, 'index'])->middleware('auth');
    Route::get('/stock/add', [StockController::class, 'addview'])->middleware('auth');
    Route::post('/addstock', [StockController::class, 'add_Product'])->middleware('auth');
    Route::get('/editStock', [StockController::class, 'edit'])->middleware('auth');
    Route::post('/editStock', [StockController::class, 'edit_product'])->middleware('auth');
    Route::post('/deleteStock/{id}', [StockController::class, 'destroy'])->middleware('auth');
});

Route::middleware(['auth', 'checkcashier'])->group(function(){
    Route::get('/transaction_cashier', [Transaction_CashierController::class, 'index']);
    Route::get('/addtransaksi', [Transaction_CashierController::class, 'addview']);
    Route::post('/addtransaction', [Transaction_CashierController::class, 'addtransaksi']);
    Route::post('/deleteTran/{id}', [Transaction_CashierController::class, 'destroy']);
    Route::get('/viewdetailTran/{id}', [Transaction_CashierController::class, 'viewDetail']);
});

//admin
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
// Route::get('/ubahprofile', [ProfileController::class, 'editview'])->middleware('auth');
// Route::post('/ubahprofile', [ProfileController::class, 'edit'])->middleware('auth');
// Route::get('/cashier', [CashierController::class, 'index'])->middleware('auth');
// Route::get('/cashier/add', [CashierController::class, 'addview'])->middleware('auth');
// Route::post('/addcashier', [CashierController::class, 'add_Cashier'])->middleware('auth');
// Route::post('/deleteUser/{id}', [CashierController::class, 'destroy'])->middleware('auth');
// Route::get('/editCashier', [CashierController::class, 'editview'])->middleware('auth');
// Route::post('/editCashier', [CashierController::class, 'edit'])->middleware('auth');
// Route::get('/transaction', [TransactionController::class, 'index'])->middleware('auth');
// Route::get('/stock', [StockController::class, 'index'])->middleware('auth');
// Route::get('/stock/add', [StockController::class, 'addview'])->middleware('auth');
// Route::post('/addstock', [StockController::class, 'add_Product'])->middleware('auth');
// Route::get('/editStock', [StockController::class, 'edit'])->middleware('auth');
// Route::post('/editStock', [StockController::class, 'edit_product'])->middleware('auth');
// Route::post('/deleteStock/{id}', [StockController::class, 'destroy'])->middleware('auth');
//kasir
// Route::get('/transaction_cashier', [Transaction_CashierController::class, 'index']);
// Route::get('/addtransaksi', [Transaction_CashierController::class, 'addview']);
// Route::post('/addtransaction', [Transaction_CashierController::class, 'addtransaksi']);
// Route::post('/deleteTran/{id}', [Transaction_CashierController::class, 'destroy']);
// Route::get('/viewdetailTran', [Transaction_CashierController::class, 'viewDetail']);



