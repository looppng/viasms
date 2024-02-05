<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;

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

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.home');
Route::get( '/wallet/create', [WalletController::class, 'create'])->name('wallet.create');
Route::post('/wallet/store', [WalletController::class, 'store'])->name('wallet.store');
Route::get('/wallet/edit/{id}', [WalletController::class, 'edit'])->name('wallet.edit');
Route::get('/wallet/update/{id}', [WalletController::class, 'update'])->name('wallet.update');

Route::get('/wallet/delete/{id}', [WalletController::class, 'destroy'])->name('wallet.destroy');
