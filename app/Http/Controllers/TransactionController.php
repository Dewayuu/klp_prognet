<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::all();
        return view('transactions', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTransaction = new Transaction();

        $newTransaction->id_transaksi = $request['id_transaksi'];
        $newTransaction->tanggal = $request['tanggal'];
        $newTransaction->total = $request['total'];

        $newTransaction->save();

        return redirect()->route('transactions.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaction::find($id);
        $transaksi->delete();
        return redirect()->route('transactions.index');
    }
}
