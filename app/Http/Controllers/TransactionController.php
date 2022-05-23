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
            'transactions' => Transaction::all(),
            'items' => Item::all()
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
        $stock = Item::find($request->item_id);
        $newStock = $stock->stock - $request->jumlah;

        $validatedData = $request->validate([
            'code' => 'required',
            'date' => 'required',
            'year' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'user_id' => 'required',
            'item_id' => 'required',
        ]); 

        Transaction::create($validatedData);

        $item = Item::find($request->item_id);
        $item->stock = $newStock;
        $item->save();

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
        return view('dashboard.transactions.edit', [
            'title' => 'Ubah Transaksi',
            'transaction' => $transaction,
            'items' => Item::all()
        ]);
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
        $validatedData = $request->validate([
            'code' => 'required',
            'date' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'user_id' => 'required',
            'item_id' => 'required',
        ]); 

        Transaction::where('id', $transaction->id)
        ->update($validatedData);

        // DB::table('transaction_detail')
        //       ->where('transaction_code', $request->code)
        //       ->update(['item_id' => $request->item_id]);

        return redirect('/dashboard/transactions')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $stock = Item::find($transaction->item_id);
        $newStock = $stock->stock + $transaction->jumlah;

        $item = Item::find($transaction->item_id);
        $item->stock = $newStock;
        $item->save();

        Transaction::destroy($transaction->id);
        return redirect('/dashboard/transactions')->with('success', 'Data berhasil dihapus');
    }
}
