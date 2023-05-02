<?php

use App\Account;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('transactions', App\Http\Controllers\TransactionController::class);
Route::resource('accounts', App\Http\Controllers\AccountController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//Accounts
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::delete('/account/{account}', [AccountController::class, 'destroy'])->name('account.destroy');

//Transactions
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::get('/transaction/create/{AccountNumber}', [TransactionController::class, 'create'])->name('transaction.create');



//Profile
Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';