<x-layout>
    <x-slot:header>Tambah Transaksi</x-slot>
    <form class="max-w-md mx-auto" method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="date" name="tanggal" id="tanggal" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="tanggal" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <select name="id_pelanggan" id="id_pelanggan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                <option value="">Pilih Pelanggan</option>
                @foreach ($cust as $customer)
                    <option value="{{ $customer->id_pelanggan }}">{{ $customer->nama }}</option>
                @endforeach
            </select>
            <label for="id_pelanggan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pelanggan</label>
        </div>

        <h3 class="text-lg font-semibold mb-2">Detail Transaksi</h3>
        <div id="transaction-details">
            <div class="transaction-detail mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <select name="produk[0][id_barang]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                        <option value="">Pilih Produk</option>
                        @foreach ($product as $produk)
                            <option value="{{ $produk->id_barang }}">{{ $produk->nama }}</option>
                        @endforeach
                    </select>
                    <label for="id_barang" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID Barang</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" name="produk[0][qty]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="qty" class="peer-focus:font-medium absolute text-sm text-gray-500 dark :text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" name="produk[0][harga]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="harga" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga Satuan</label>
                </div>
            </div>
        </div>

        <button type="button" onclick="location.href='{{ route('transactions.index') }}'"
            style="padding: 10px 20px; font-size: 14px; border: none; border-radius: 4px; background-color: #95a5a6; color: white; cursor: pointer; transition: background-color 0.3s ease;"
            onmouseover="this.style.backgroundColor='#7f8c8d';"
            onmouseout="this.style.backgroundColor='#95a5a6';">
            Kembali
        </button>
        <button type="button" id="add-detail" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Tambah Detail Produk</button>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
        
        </form>

    <script>
        document.getElementById('add-detail').addEventListener('click', function() {
            var detailCount = document.querySelectorAll('.transaction-detail').length;
            var newDetail = `
                <div class="transaction-detail mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <select name="produk[${detailCount}][id_barang]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                            <option value="">Pilih Produk</option>
                            @foreach ($product as $produk)
                                <option value="{{ $produk->id_barang }}">{{ $produk->nama }}</option>
                            @endforeach
                        </select>
                        <label for="id_barang" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID Barang</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="produk[${detailCount}][qty]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="qty" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y- 0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="produk[${detailCount}][harga]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="harga" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga Satuan</label>
                    </div>
                </div>
            `;
            document.getElementById('transaction-details').insertAdjacentHTML('beforeend', newDetail);
        });
    </script>
</x-layout>