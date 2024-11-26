<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cust = Customer::all();
        return view('customers', compact('cust'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:30',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index');
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
        $pelanggan = Customer::where('id_pelanggan', $id)->first();
        return view('customers-edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Customer::where('id_pelanggan', $id)->first();

        $pelanggan->nama = $request['nama'];
        $pelanggan->alamat = $request['alamat'];
        $pelanggan->telepon = $request['telepon'];
        $pelanggan->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Customer::where('id_pelanggan', $id)->first();
        $pelanggan->delete();
        return redirect()->route('customers.index');
    }
}
