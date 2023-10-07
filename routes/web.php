<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UserPurchasesController;
use App\Models\Inventory;
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
    return view('welcome');
});

Auth::routes();


Route::get('/sales/userindex', [UserSalesController::class, 'userindex'])->name('sales.userindex');
Route::get('/sales/usershow/{id}', [UserSalesController::class, 'usershow'])->name('sales.usershow');
Route::get('/sales/usercreate', [UserSalesController::class, 'usercreate'])->name('sales.usercreate');
Route::post('/sales', [UserSalesController::class, 'userstore'])->name('sales.userstore');
Route::get('/sales/{sales}/useredit', [UserSalesController::class, 'useredit'])->name('sales.useredit');
Route::put('/sales/{sales}', [UserSalesController::class, 'userupdate'])->name('sales.userupdate');
Route::delete('/sales/{sales}', [UserSalesController::class, 'userdestroy'])->name('sales.userdestroy');

Route::get('/purchases/userindex', [UserPurchasesController::class, 'userindex'])->name('purchases.userindex');
Route::get('/purchases/usershow/{id}', [UserPurchasesController::class, 'usershow'])->name('purchases.usershow');
Route::get('/purchases/usercreate', [UserPurchasesController::class, 'usercreate'])->name('purchases.usercreate');
Route::post('/purchases', [UserPurchasesController::class, 'userstore'])->name('purchases.userstore');
Route::get('/purchases/{purchases}/useredit', [UserPurchasesController::class, 'useredit'])->name('purchases.useredit');
Route::put('/purchases/{purchases}', [UserPurchasesController::class, 'userupdate'])->name('purchases.userupdate');
Route::delete('/purchases/{purchases}', [UserPurchasesController::class, 'userdestroy'])->name('purchases.userdestroy');

/*------------------------------------------
--------------------------------------------
All Sale Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:sales'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/


Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('admin.home');

    Route::get('/pdf3', [PurchasesController::class, 'adminpPDF'])->name('pdf3');
    Route::get('/pdf4', [SalesController::class, 'adminsPDF'])->name('pdf4');
    Route::get('/pdf5', [InventoryController::class, 'adminiPDF'])->name('pdf5');


    Route::get('/inventories/index', [InventoryController::class, 'index'])->name('inventories.index');
    Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
    Route::post('/inventories', [InventoryController::class, 'store'])->name('inventories.store');
    Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
    Route::put('/inventories/{inventory}', [InventoryController::class, 'update'])->name('inventories.update');
    Route::delete('/inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventories.destroy');

    Route::get('/sales/index', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/sales/show/{id}', [SalesController::class, 'show'])->name('sales.show');
    Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/sales/{sales}/edit', [SalesController::class, 'edit'])->name('sales.edit');
    Route::put('/sales/{sales}', [SalesController::class, 'update'])->name('sales.update');
    Route::delete('/sales/{sales}', [SalesController::class, 'destroy'])->name('sales.destroy');

    Route::get('/purchases/index', [PurchasesController::class, 'index'])->name('purchases.index');
    Route::get('/purchases/show/{id}', [PurchasesController::class, 'show'])->name('purchases.show');
    Route::get('/purchases/create', [PurchasesController::class, 'create'])->name('purchases.create');
    Route::post('/purchases', [PurchasesController::class, 'store'])->name('purchases.store');
    Route::get('/purchases/{purchases}/edit', [PurchasesController::class, 'edit'])->name('purchases.edit');
    Route::put('/purchases/{purchases}', [PurchasesController::class, 'update'])->name('purchases.update');
    Route::delete('/purchases/{purchases}', [PurchasesController::class, 'destroy'])->name('purchases.destroy');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [ManagerController::class, 'managerHome'])->name('manager.home');
    Route::get('/sales/managerindex', [ManagerController::class, 'managerindex'])->name('sales.managerindex');
    Route::get('/pdf2', [ManagerController::class, 'generatPDF'])->name('pdf2');
    Route::get('/purchases/managerrindex', [ManagerController::class, 'managerrindex'])->name('purchases.managerrindex');
    Route::get('/pdf', [ManagerController::class, 'generatePDF'])->name('pdf');
});

/*------------------------------------------
--------------------------------------------
All Purchase Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:purchase'])->group(function () {

    Route::get('/purchase/home', [PurchaseController::class, 'purchaseHome'])->name('purchase.home');
});
