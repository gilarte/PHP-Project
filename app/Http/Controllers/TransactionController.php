<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        request()->validate(Transaction::$rules);

        $model = new Transaction;
        $transaction = $model->create($request->all());

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
