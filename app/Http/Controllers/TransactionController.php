<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transactions.index', [
            'title' => 'Transaksi',
            'transactions' => Transaction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transactions.create', [
            'title' => 'Tambah Transaksi',
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'date' => 'required',
            'total' => 'required',
            'user_id' => 'required',
        ]); 

        // $data = [
        //     [
        //         'transaction_id' => $request->code,
        //         'item_id' => $request->item_id
        //     ]
        // ];

        Transaction::create($validatedData);
        // DB::insert('insert into transaction_detail (transaction_code, item_id) values (?, ?)', ['transaction_code' => $request->code, 'item_id' => $request->item_id]);

        DB::table('transaction_detail')->insert([
            'transaction_code' => $request->code,
            'item_id' => $request->item_id
        ]);

        return redirect('/dashboard/transactions')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);
        return redirect('/dashboard/transactions')->with('success', 'Data berhasil dihapus');
    }
}
