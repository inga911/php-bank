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

});
Route::prefix('account')->name('account-')->group(function() {
    Route::get('/home', [ClientController::class, 'home'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create', [AccountController::class, 'create'])->name('create');
    Route::post('/create', [AccountController::class, 'store'])->name('store');
    Route::get('/{client}', [AccountController::class, 'show'])->name('show');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
