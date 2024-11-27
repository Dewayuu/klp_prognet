<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all transactions with their details
        $transaction = Transaction::with('customer', 'transactionDetails')->get();
        return view('transactions', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cust = Customer::all(); // Fetch all customers
        $product = Product::all(); // Fetch all products
        return view('transactions-create', compact('cust', 'product'));
    }


    protected function getLastTransactionId()
    {
        $lastTransaction = Transaction::latest('id_transaksi')->first();
        if (!$lastTransaction) {
            throw new \Exception('No transactions found.');
        }
        return $lastTransaction->id_transaksi;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_pelanggan' => 'required|exists:customers,id_pelanggan',
            'produk' => 'required|array',
            'produk.*.id_barang' => 'required|exists:products,id_barang',
            'produk.*.qty' => 'required|numeric',
            'produk.*.harga' => 'required|numeric',
        ]);

        // Create and save the transaction
        $transaction = new Transaction();
        $transaction->tanggal = $validated['tanggal'];
        $transaction->id_pelanggan = $validated['id_pelanggan'];
        $transaction->total = collect($validated['produk'])->sum(function ($item) {
            return $item['qty'] * $item['harga'];
        });
        $transaction->save();

        // Retrieve the transaction ID explicitly
        $transactionId = $this->getLastTransactionId();

        // Save transaction details
        foreach ($validated['produk'] as $detail) {
            $transactionDetail = new Transaction_detail();
            $transactionDetail->id_transaksi = $transactionId;
            $transactionDetail->id_barang = $detail['id_barang'];
            $transactionDetail->qty = $detail['qty'];
            $transactionDetail->harga = $detail['harga'];
            $transactionDetail->save();

            // Update stock for the product
            $product = Product::find($detail['id_barang']);
            $product->stok -= $detail['qty'];  // Reduce stock by the quantity sold
            $product->save();
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the transaction and its details, including the customer and product information
        $transaction = Transaction::with(['customer', 'transactionDetails.product'])
            ->findOrFail($id);

        // Pass the transaction data to the view
        return view('transactionsdetail', compact('transaction'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaction = Transaction::with('transactionDetails')->findOrFail($id);
        $cust = Customer::all();
        $product = Product::all();
        return view('transactions-edit', compact('transaction', 'cust', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_pelanggan' => 'required|exists:customers,id_pelanggan',
            'produk' => 'required|array',
            'produk.*.id_barang' => 'required|exists:products,id_barang',
            'produk.*.qty' => 'required|numeric',
            'produk.*.harga' => 'required|numeric',
        ]);

        $transaction = Transaction::find($id);
        $transaction->tanggal = $validated['tanggal'];
        $transaction->id_pelanggan = $validated['id_pelanggan'];
        $transaction->total = collect($validated['produk'])->sum(function ($item) {
            return $item['qty'] * $item['harga'];
        }); // Calculate total
        $transaction->save();  // Save the updated transaction

        // 1. Update stok produk yang sebelumnya
        foreach ($transaction->transactionDetails as $oldDetail) {
            $oldProduct = Product::find($oldDetail->id_barang);
            $oldProduct->stok += $oldDetail->qty;  // Add the old quantity back to the stock
            $oldProduct->save();
        }

        // 2. Remove old transaction details
        $transaction->transactionDetails()->delete();

        // 3. Save new transaction details and update stock
        foreach ($validated['produk'] as $detail) {
            $transactionDetail = new Transaction_detail();
            $transactionDetail->id_transaksi = $transaction->id_transaksi;
            $transactionDetail->id_barang = $detail['id_barang'];
            $transactionDetail->qty = $detail['qty'];
            $transactionDetail->harga = $detail['harga'];
            $transactionDetail->save();

            // Update stock for the new quantity sold
            $product = Product::find($detail['id_barang']);
            $product->stok -= $detail['qty'];  // Reduce stock by the quantity sold
            $product->save();
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Fetch the transaction and its details
        $transaction = Transaction::findOrFail($id);

        // 1. Update stok produk yang terkait dengan transaksi yang akan dihapus
        foreach ($transaction->transactionDetails as $detail) {
            $product = Product::find($detail->id_barang);
            $product->stok += $detail->qty;  // Add the quantity back to the stock
            $product->save();
        }

        // 2. Delete related transaction details
        $transaction->transactionDetails()->delete();

        // 3. Delete the transaction itself
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

}
