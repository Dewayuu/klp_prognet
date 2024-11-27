<x-layout>
    <x-slot:header>Edit Produk</x-slot>
    <form class="max-w-md mx-auto" method="POST" action="{{ route('products.update', $produk['id_barang']) }}">
        @csrf
        @method('PUT')

        <!-- ID Produk -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="id" id="id" value="{{ $produk['id_barang'] }}" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                focus:ring-0 focus:border-blue-600 peer" placeholder=" " readonly required />
            <label for="id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 
                duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 
                rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID</label>
        </div>

        <!-- Kode Produk -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="kode" id="kode" value="{{ $produk['kode'] }}" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="kode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 
                duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 
                rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode</label>
        </div>

        <!-- Nama Produk -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nama" id="nama" value="{{ $produk['nama'] }}" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="nama" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 
                duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 
                rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
        </div>

        <!-- Harga Produk -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="harga" id="harga" value="{{ $produk['harga'] }}" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="harga" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 
                duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 
                rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga</label>
        </div>

        <!-- Stok Produk -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="stok" id="stok" value="{{ $produk['stok'] }}" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="stok" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 
                duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 
                rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stok</label>
        </div>

        <!-- Pilih Satuan -->
        <div class="relative z-0 w-full mb-5 group">
            <select name="id_satuan" id="id_satuan" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none 
                focus:ring-0 focus:border-blue-600 peer" required>
                <option value="" disabled {{ is_null($produk['id_satuan']) ? 'selected' : '' }}>Pilih Satuan</option>
                @foreach ($measurements as $measurement)
                    <option value="{{ $measurement->id_satuan }}" 
                        {{ $produk['id_satuan'] == $measurement->id_satuan ? 'selected' : '' }}>
                        {{ $measurement->nama_satuan }}
                    </option>
                @endforeach
            </select>
            <label for="id_satuan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 
                duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 
                rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Satuan</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
    </form>    
</x-layout>
