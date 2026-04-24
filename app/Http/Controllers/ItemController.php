<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('item.index', [
            'title' => 'Item', 
            'items' => Item::all(),
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create', ['title' => 'Create Item']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
           $validated = $request->validate([
        'item_name' => 'required|max:255',
        'item_code' => 'required|max:7',
        'category' => 'required',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',
        
    ], [
        'item_name.required' => 'Nama barang tidak boleh kosong',
        'item_name.max' => 'Nama barang tidak boleh lebih dari :max karakter',
        'item_code.required' => 'Kode barang tidak boleh kosong',
        'item_code.max' => 'Kode barang tidak boleh lebih dari :max karakter',
        'category.required' => 'Kategori barang harus di isi',
        'stock.required' => 'Stok barang tidak boleh kosong',
        'stock.numeric' => 'Stok barang wajib angka',
        'price.required' => 'harga tidak boleh kosong',
        'price.numeric' => 'harga wajib angka',


    ]);

     Item::create($validated);
     return to_route('item.index')->withSuccess('Data berhasil ditambahkan');
 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
         return view('item.edit', [
            'title' => 'Edit Item', 
            'item' => $item,
            
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
               
           $validated = $request->validate([
        'item_name' => 'required|max:255',
        'item_code' => 'required|max:7',
        'category' => 'required',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',
        
    ], [
        'item_name.required' => 'Nama barang tidak boleh kosong',
        'item_name.max' => 'Nama barang tidak boleh lebih dari :max karakter',
        'item_code.required' => 'Kode barang tidak boleh kosong',
        'item_code.max' => 'Kode barang tidak boleh lebih dari :max karakter',
        'category.required' => 'Kategori barang harus di isi',
        'stock.required' => 'Stok barang tidak boleh kosong',
        'stock.numeric' => 'Stok barang wajib angka',
        'price.required' => 'harga tidak boleh kosong',
        'price.numeric' => 'harga wajib angka',


    ]);

     $item->update($validated);
     return to_route('item.index')->withSuccess('Data berhasil diubah');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
