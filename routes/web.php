<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
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

//invoice
Route::get('/invoice' , [InvoiceController::class,'index'])->name('invoice');

Route::get('/create_invoice' , [InvoiceController::class,'setInvoice'])->name('create_invoice');

Route::post('/session' , [InvoiceController::class,'Session'])->name('session');//create session

Route::get('/clear_session' , [InvoiceController::class,'clearSession'])->name('clear_session');// clear table
Route::delete('/delete-selected-item/{index}', [InvoiceController::class,'deleteSelectedItem'])->name('delete-selected-item');//delete row in table


