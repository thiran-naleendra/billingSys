<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [MainController::class, 'index'])->name('home');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); // log out

// Route::get('/home' , [MainController::class,'index'])->name('home');

//item
Route::get('/item_list' , [ItemController::class,'index'])->name('item_list');
Route::post('/item_store',[ItemController::class,'itemstore'])->name('item_store');
Route::get('/edit-item-{id}', [ItemController::class, 'edit'])->name('edit-item'); // edit item
Route::delete('/item/delete/{id}', [ItemController::class, 'delete'])->name('item.delete'); // delete item
route::put('/items/{id}', [ItemController::class, 'update'])->name('item.update');



//invoice
Route::get('/invoice' , [InvoiceController::class,'index'])->name('invoice');
Route::get('/invoice_list' , [InvoiceController::class,'invoce_li'])->name('invoice_list');

Route::get('/create_invoice' , [InvoiceController::class,'setInvoice'])->name('create_invoice');

Route::post('/session' , [InvoiceController::class,'Session'])->name('session');//create session
Route::post('/customer-session', [InvoiceController::class,'customerSession'])->name('customer-session');

Route::get('/clear_session' , [InvoiceController::class,'clearSession'])->name('clear_session');// clear table
Route::delete('/delete-selected-item/{index}', [InvoiceController::class,'deleteSelectedItem'])->name('delete-selected-item');//delete row in table


Route::get('/add_customer', [CustomerController::class, 'index'])->name('add_customer');//add customer balde
Route::post('/create_customere' , [CustomerController::class,'addCustomer'])->name('create_customer');

route::post('/store-invoice', [InvoiceController::class, 'storeInvoice'])->name('store-invoice');//store invoice to db 

route::get('/invoice/view/{id}', [InvoiceController::class, 'view'])->name('invoice.view');
Route::delete('/invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');


// invoice list view
Route::get('/invoicelist_view', [InvoiceController::class,'invoicelist_view'])->name('invoicelist_view');


