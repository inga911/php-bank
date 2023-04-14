<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

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
    Route::get('/editadd/{client}', [ClientController::class, 'editadd'])->name('editadd');
    Route::put('/editadd/{client}', [ClientController::class, 'updateadd'])->name('updateadd');
    Route::get('/editminus/{client}', [ClientController::class, 'editminus'])->name('editminus');
    Route::put('/editminus/{client}', [ClientController::class, 'updateminus'])->name('updateminus');
    Route::get('/editinfo/{client}', [ClientController::class, 'editinfo'])->name('editinfo');
    Route::put('/editinfo/{client}', [ClientController::class, 'updateinfo'])->name('updateinfo');
    Route::delete('/delete/{client}', [ClientController::class, 'destroy'])->name('delete');

});

Route::prefix('orders')->name('orders-')->group(function() {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/home', [OrderController::class, 'home'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/create', [OrderController::class, 'store'])->name('store');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    // Route::get('/editadd/{order}', [OrderController::class, 'editadd'])->name('editadd');
    // Route::put('/editadd/{order}', [OrderController::class, 'updateadd'])->name('updateadd');
    // Route::get('/editminus/{order}', [OrderController::class, 'editminus'])->name('editminus');
    // Route::put('/editminus/{order}', [OrderController::class, 'updateminus'])->name('updateminus');
    // Route::get('/editinfo/{order}', [OrderController::class, 'editinfo'])->name('editinfo');
    // Route::put('/editinfo/{order}', [OrderController::class, 'updateinfo'])->name('updateinfo');
    Route::delete('/delete/{order}', [OrderController::class, 'destroy'])->name('delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
