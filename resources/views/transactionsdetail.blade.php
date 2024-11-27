<x-layout>
    <x-slot:header>Detail Transaksi</x-slot>

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl font-bold mb-4">Detail Transaksi</h2>
        
        <div class="mb-4">
            <p><strong>ID Transaksi:</strong> {{ $transaction->id_transaksi }}</p>
            <p><strong>Tanggal:</strong> {{ $transaction->tanggal }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ $transaction->customer->nama ?? 'Data pelanggan tidak tersedia' }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
        </div>

        <h3 class="text-xl font-semibold mb-2">Produk yang Dibeli:</h3>
        <table class="table-auto w-full text-left border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nama Produk</th>
                    <th class="border border-gray-300 px-4 py-2">Harga</th>
                    <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                    <th class="border border-gray-300 px-4 py-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaction->transactionDetails as $detail)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $detail->product->nama ?? 'Produk tidak tersedia' }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ floor($detail->qty) }}</td> 
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format(floor($detail->qty) * $detail->harga, 0, ',', '.') }}</td> <!-- Subtotal dengan jumlah bulat -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center border border-gray-300 px-4 py-2">Tidak ada produk yang dibeli</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('transactions.index') }}" class="text-blue-500 hover:underline">Kembali ke Daftar Transaksi</a>
        </div>
    </div>
</x-layout>
