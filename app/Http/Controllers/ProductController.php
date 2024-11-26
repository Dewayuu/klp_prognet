<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('products', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newProduct = new Product();

        $newProduct->id = $request['id'];
        $newProduct->kode = $request['kode'];
        $newProduct->nama = $request['nama'];
        $newProduct->harga = $request['harga'];
        $newProduct->stok = $request['stok'];

        $newProduct->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk =  Product::find($id);
        return view('products-edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Product::find($id);

        $produk->id = $request['id'];
        $produk->kode = $request['kode'];
        $produk->nama = $request['nama'];
        $produk->harga = $request['harga'];
        $produk->stok = $request['stok'];

        $produk->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Product::find($id);
        $produk->delete();
        return redirect()->route('products.index');
    }
}
