<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
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
        $product = Product::with('measurement')->get();  // Eager load measurements to display in the listing
        return view('products', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $measurements = Measurement::all();  // Fetch all measurements from the database
        return view('products-create', compact('measurements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_satuan' => 'required|exists:measurements,id_satuan', // Validate that the measurement exists
        ]);

        // Create a new product and associate the measurement
        $newProduct = new Product();
        $newProduct->kode = $request['kode'];
        $newProduct->nama = $request['nama'];
        $newProduct->harga = $request['harga'];
        $newProduct->stok = $request['stok'];
        $newProduct->id_satuan = $request['id_satuan']; // Store the selected id_satuan

        $newProduct->save();  // Save the new product

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
        $produk = Product::find($id);
        $measurements = Measurement::all();  // Fetch all measurements for the edit form
        return view('products-edit', compact('produk', 'measurements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Product::find($id);
        
        // Validate the request
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_satuan' => 'required|exists:measurements,id_satuan', // Validate the measurement id
        ]);

        // Update the product
        $produk->kode = $request['kode'];
        $produk->nama = $request['nama'];
        $produk->harga = $request['harga'];
        $produk->stok = $request['stok'];
        $produk->id_satuan = $request['id_satuan'];  // Update the id_satuan

        $produk->save();  // Save the updated product

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Product::find($id);
        $produk->delete();  // Delete the product
        return redirect()->route('products.index');
    }
}
