<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;



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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('clients')->name('clients-')->group(function() {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/home', [ClientController::class, 'home'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create', [ClientController::class, 'create'])->name('create');
    Route::post('/create', [ClientController::class, 'store'])->name('store');
    Route::get('/{client}', [ClientController::class, 'show'])->name('show');
    Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('edit');
    Route::put('/edit/{client}', [ClientController::class, 'update'])->name('update');
    Route::delete('/delete/{client}', [ClientController::class, 'destroy'])->name('delete');

});
Route::prefix('account')->name('account-')->group(function() {
    Route::get('/home', [ClientController::class, 'home'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create', [AccountController::class, 'create'])->name('create');
    Route::post('/create', [AccountController::class, 'store'])->name('store');
    Route::get('/{client}', [AccountController::class, 'show'])->name('show');
    Route::get('/add/{client}/accounts/{account}/add', [AccountController::class, 'add'])->name('add');
    Route::put('/clients/{client}/accounts/{account}/updateAdd', [AccountController::class, 'updateAdd'])->name('updateAdd');
    Route::get('/deduct/{client}/accounts/{account}/deduct', [AccountController::class, 'deduct'])->name('deduct');
    Route::put('/clients/{client}/accounts/{account}/updateDeduct', [AccountController::class, 'updateDeduct'])->name('updateDeduct');    
    Route::get('/transfer/{client}', [AccountController::class, 'transfer'])->name('transfer');
    Route::put('/transfer/{client}', [AccountController::class, 'updateTransfer'])->name('updateTransfer');
    Route::delete('/delete/{client}/accounts/{account}', [AccountController::class, 'destroy'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
