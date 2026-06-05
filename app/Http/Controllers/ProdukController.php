<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $produks = Produk::latest()->filter(request(['keyword', 'category_id']));

        return view('produk.index', [
            'title' => 'Produk', 
            'categorys' => Category::latest()->get(),  
            'produks' => $produks->paginate(5)->withQueryString(),
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', [
            'title' => 'Create Produk',
            'categorys' => Category::latest()->get(),  

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name'          => 'required|max:255',
        'brand'         => 'required|max:255',
        'category_id'   => 'required|exists:categories,id',
        'unit'          => 'required|numeric',
        'specification' => 'required',
        'status'        => 'required',
        
    ], [
        'name.required'          => 'Nama produk tidak boleh kosong',
        'name.max'               => 'Nama produk tidak boleh lebih dari 255 karakter',
        'brand.required'         => 'Brand tidak boleh kosong',
        'brand.max'              => 'Brand tidak boleh lebih dari 255 karakter',
        'category_id.required'   => 'Silakan pilih kategori terlebih dahulu',
        'category_id.exists'     => 'Kategori yang dipilih tidak valid',
        'unit.required'          => 'Jumlah unit tidak boleh kosong',
        'unit.numeric'           => 'Jumlah unit harus berupa angka',
        'specification.required' => 'Spesifikasi produk harus diisi',
        'status.required'        => 'Status produk harus dipilih',    
    ]);

     try {
        DB::beginTransaction();
        Produk::create($validated);
        DB::commit();
        return to_route('produk.index')->withSuccess('Data berhasil ditambahkan');
    } catch (\Exception $e) {
        DB::rollBack();
        return to_route('produk.create')->withError('Data gagal ditambahkan');

    }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', [
            'title' => 'Detail Produk ' . $produk->name,
            'produk' => $produk,  

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
             return view('produk.edit', [
            'title' => 'Edit Produk',
            'categorys' => Category::latest()->get(),  
            'produk' => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
        {
        $validated = $request->validate([
        'name'          => 'required|max:255',
        'brand'         => 'required|max:255',
        'category_id'   => 'required|exists:categories,id',
        'unit'          => 'required|numeric',
        'specification' => 'required',
        'status'        => 'required',
        
    ], [
        'name.required'          => 'Nama produk tidak boleh kosong',
        'name.max'               => 'Nama produk tidak boleh lebih dari 255 karakter',
        'brand.required'         => 'Brand tidak boleh kosong',
        'brand.max'              => 'Brand tidak boleh lebih dari 255 karakter',
        'category_id.required'   => 'Silakan pilih kategori terlebih dahulu',
        'category_id.exists'     => 'Kategori yang dipilih tidak valid',
        'unit.required'          => 'Jumlah unit tidak boleh kosong',
        'unit.numeric'           => 'Jumlah unit harus berupa angka',
        'specification.required' => 'Spesifikasi produk harus diisi',
        'status.required'        => 'Status produk harus dipilih',    

    ]);


     try {
        DB::beginTransaction();
        Produk::create($validated);
        DB::commit();
        return to_route('produk.index')->withSuccess('Data berhasil diubah');
    } catch (\Exception $e) {
        DB::rollBack();
        return to_route('produk.edit', $produk)->withError('Data gagal diubah');

    }
 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        {
        $produk->delete($produk);
        return to_route('produk.index')->withSuccess('Data berhasil dihapus');
    }
    }
}
