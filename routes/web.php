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
    $user = Auth::user();
    $cuentas = Account::where('user_id', $user->id)->get();
    $sumaSaldo = $cuentas->sum('balance');
    return view('dashboard', ['sumaSaldo' => $sumaSaldo]);
})->middleware(['auth', 'verified'])->name('dashboard');



//Accounts
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::put('/account/{account}', [AccountController::class, 'update'])->name('accounts.update');
Route::delete('/account/{account}', [AccountController::class, 'destroy'])->name('account.destroy');

//Transactions
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::put('/transaction', [TransactionController::class, 'update'])->name('transactions.update');
Route::get('/transaction/create/{AccountNumber}', [TransactionController::class, 'create'])->name('transaction.create');



//Profile
Route::middleware('auth')->group(function() {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';