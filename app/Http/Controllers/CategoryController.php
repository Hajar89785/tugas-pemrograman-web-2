<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $categorys = Category::latest();
    $keyword = request('keyword');
    if($keyword){
        $categorys->where('name', 'like', '%' . $keyword . '%');
    }
    
        return view('category.index', [
            'title' => 'Category', 
            'categorys' => $categorys->paginate(2)->withQueryString(),
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create', [
            'title' => 'Create Category',
            'items' => Item::latest()->get(),  
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'code' => 'required|unique:categories|max:10',
        'description' => 'required',
        
    ], [
        'name.required' => 'Nama kategori tidak boleh kosong',
        'name.max' => 'Nama kategori tidak boleh lebih dari :max karakter',
        'code.required' => 'Kode barang tidak boleh kosong',
        'code.unique' => 'Kode kategori sudah terdaftar, gunakan kode lain',
        'code.max' => 'Kode kategori tidak boleh lebih dari :max karakter',
        'description.required' => 'Deskripsi kategori harus diisi',
    
    ]);

     Category::create($validated);
     return to_route('category.index')->withSuccess('Data berhasil ditambahkan');
 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', [
            'title' => 'Detail Category ' . $category->name,
            'category' => $category,  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
         return view('category.edit', [
            'title' => 'Edit Category',
            'items' => Item::latest()->get(), 
            'category' => $category, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'code' => 'required|unique:categories|max:10',
        'description' => 'required',
        
    ], [
        'name.required' => 'Nama kategori tidak boleh kosong',
        'name.max' => 'Nama kategori tidak boleh lebih dari :max karakter',
        'code.required' => 'Kode barang tidak boleh kosong',
        'code.unique' => 'Kode kategori sudah terdaftar, gunakan kode lain',
        'code.max' => 'Kode kategori tidak boleh lebih dari :max karakter',
        'description.required' => 'Deskripsi kategori harus diisi',
    
    ]);

     $category->update($validated);
     return to_route('category.index')->withSuccess('Data berhasil diubah');
 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete($category);
        return to_route('category.index')->withSuccess('Data berhasil dihapus');
    }
}
