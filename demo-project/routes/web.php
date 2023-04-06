<?php

use App\Cuenta;
use App\Http\Controllers\CuentaController;
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
Route::resource('cuentas', App\Http\Controllers\CuentaController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//Accounts
Route::get('/cuenta', [CuentaController::class, 'index'])->name('cuenta');
Route::delete('/cuenta/{cuenta}', [CuentaController::class, 'destroy'])->name('cuenta.destroy');

/*
Route::get('/cuenta', function () {
    return view('cuenta/index', ["cuentas"=>[]]);
})->name('cuenta');

Route::middleware('auth')->group(function () {
    Route::get('/cuenta', [CuentaController::class, 'index'])->name('cuenta.index');
    Route::get('/cuenta', [CuentaController::class, 'create'])->name('cuenta.create');
    Route::get('/cuenta', [CuentaController::class, 'edit'])->name('cuenta.edit');
});
*/

//Transactions
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');



//Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';