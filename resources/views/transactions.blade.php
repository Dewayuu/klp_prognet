<x-layout>
    <x-slot:header>Daftar Transaksi</x-slot>
    <body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">

    <div style="max-width: 1000px; margin: 2rem auto; padding: 1rem; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <table style="width: 100%; border-collapse: collapse; border-radius: 8px; overflow: hidden;">
            <thead style="background-color: #2c3e50; color: white; text-transform: uppercase; font-size: 14px;">
                <tr>
                    <th style="padding: 12px 16px; text-align: center;">ID Transaksi</th>
                    <th style="padding: 12px 16px; text-align: left;">Tanggal</th>
                    <th style="padding: 12px 16px; text-align: left;">Nama Pembeli</th>
                    <th style="padding: 12px 16px; text-align: left;">Total Harga</th>
                    <th style="padding: 12px 16px; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transaction as $transaksi)
                <tr style="background-color: #ecf0f1;">
                    <td style="padding: 12px 16px; text-align: center;">{{ $transaksi['id_transaksi'] }}</td>
                    <td style="padding: 12px 16px; text-align: left;">{{ $transaksi['tanggal'] }}</td>
                    <td style="padding: 12px 16px; text-align: left;">{{ $transaksi->customer->nama }}</td>
                    <td style="padding: 12px 16px; text-align: left;">{{ $transaksi['total'] }}</td>
                    <td style="padding: 12px 16px; text-align: center; display: flex; justify-content: center; gap: 15px;">
                        <!-- Tombol View Details -->
                        <a href="{{ route('transactions.show', $transaksi->id_transaksi) }}" 
                        style="text-decoration: none;">
                            <button style="padding: 8px 12px; font-size: 14px; border: none; border-radius: 4px; cursor: pointer; background-color: #3498db; color: white; transition: background-color 0.3s ease;"
                                onmouseover="this.style.backgroundColor='#2980b9';" 
                                onmouseout="this.style.backgroundColor='#3498db';">
                                View Details
                            </button>
                        </a>

                        <!-- Form Delete -->
                        <form action="{{ route('transactions.destroy', $transaksi->id_transaksi) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 8px 12px; font-size: 14px; border: none; border-radius: 4px; cursor: pointer; background-color: #e74c3c; color: white; transition: background-color 0.3s ease;"
                                onmouseover="this.style.backgroundColor='#c0392b';" 
                                onmouseout="this.style.backgroundColor='#e74c3c';">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Tombol Tambah Produk -->
            <div style="display: flex; justify-content: flex-end; margin-top: 16px;">
                <button onclick="location.href='{{ route('transactions.create') }}'" style="padding: 10px 20px; font-size: 14px; border: none; border-radius: 4px; background-color: #3498db; color: white; cursor: pointer; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#2980b9';" 
                    onmouseout="this.style.backgroundColor='#3498db';">
                    Tambah Transaksi
                </button>
            </div>
    </div>
</body>
</x-layout>