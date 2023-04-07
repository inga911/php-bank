<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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
    Route::get('/create', [ClientController::class, 'create'])->name('create');
    Route::post('/create', [ClientController::class, 'store'])->name('store');
    Route::get('/{client}', [ClientController::class, 'show'])->name('show');
    Route::get('/editadd/{client}', [ClientController::class, 'editadd'])->name('editadd');
    Route::put('/editadd/{client}', [ClientController::class, 'update'])->name('update');
    Route::get('/editminus/{client}', [ClientController::class, 'editminus'])->name('editminus');
    Route::put('/editminus/{client}', [ClientController::class, 'update'])->name('update');
    Route::delete('/delete/{client}', [ClientController::class, 'destroy'])->name('delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
