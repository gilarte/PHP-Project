<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $accounts = Account::where('user_id', $user->id)->get();

        $transactions = Transaction::whereHas('account', function ($query) use ($accounts) {
        $query->whereIn('AccountNumber', $accounts->pluck('AccountNumber'));
        })->paginate(10);

        return view('transaction/index', compact('transactions'))
            ->with('i', (request()->input('page', 1) - 1) * $transactions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $accounts = Account::query()->where('user_id', $user->id)->get();
        $transaction = new Transaction();
        return view('transaction/create', compact('transaction', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
    // Validar los datos de entrada
    $request->validate(Transaction::$rules);

    // Obtener la cuenta de origen
    $account = Account::where('AccountNumber', $request->AccountNumber)->first();

    // Verificar que la cantidad enviada no sea mayor que la cantidad disponible
    if ($request->amount > $account->balance) {
        return redirect()->back()->withErrors(['amount' => 'The amount sent cannot be greater than the available balance.'])->withInput();
    }

    // Crear la transacción
    $transaction = new Transaction($request->all());
    $transaction->save();

    // Actualizar el balance de la cuenta de origen y la cuenta de destino
    $account->balance -= $request->amount;
    $account->save();

    $destination_account = Account::where('AccountNumber', $request->AccountNumberD)->first();
    $destination_account->balance += $request->amount;
    $destination_account->save();

    return redirect()->route('transactions.index')
        ->with('success', 'Transaction created successfully.');
    }  


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Transaction;
        $transaction = $model->find($id);

        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Transaction;
        $transaction = $model->find($id);

        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        request()->validate(Transaction::$rules);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $model = new Transaction;
        $transaction = $model->find($id)->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully');
    }

    
}
