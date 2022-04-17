<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.items.index', [
            'title' => 'Barang',
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.items.create', [
            'title' => 'Tambah Barang'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]); 

        Item::create($validatedData);

        return redirect('/dashboard/items')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('dashboard.items.edit', [
            'title' => 'Ubah Barang',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]); 

        Item::where('id', $item->id)
            ->update($validatedData);

        return redirect('/dashboard/items')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Item::destroy($item->id);
        return redirect('/dashboard/items')->with('success', 'Data berhasil dihapus');
    }

    public function getItemById($itemId)
    {
        $item = Item::where('id',$itemId)->get();
        $data = $item->toArray(); 

        return response()->json($data);
    }
}
