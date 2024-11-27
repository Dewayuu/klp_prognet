<x-layout>
    <x-slot:header>Edit Pelanggan</x-slot>
    <form class="max-w-md mx-auto" method="POST" action="{{ route('customers.update',$pelanggan['id_pelanggan']) }}">
        @csrf
        @method('PUT')
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="id_pelanggan" id="id_pelanggan" value="{{ $pelanggan['id_pelanggan'] }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="id_pelanggan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID Pelanggan</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nama" id="nama" value="{{ $pelanggan['nama'] }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="nama" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Pelanggan</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="alamat" id="alamat" value="{{ $pelanggan['alamat'] }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="alamat" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="telepon" id="telepon" value="{{ $pelanggan['telepon'] }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="telepon" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telepon</label>
        </div>
        <!-- Tombol Submit -->
        <div style="display: flex; justify-content: space-between;">
                    <button type="button" onclick="location.href='{{ route('customers.index') }}'"
                        style="padding: 10px 20px; font-size: 14px; border: none; border-radius: 4px; background-color: #95a5a6; color: white; cursor: pointer; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#7f8c8d';"
                        onmouseout="this.style.backgroundColor='#95a5a6';">
                        Kembali
                    </button>
                    
                    <button type="submit"
                        style="padding: 10px 20px; font-size: 14px; border: none; border-radius: 4px; background-color: #3498db; color: white; cursor: pointer; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#2980b9';"
                        onmouseout="this.style.backgroundColor='#3498db';">
                        Simpan
                    </button>
        </div>    
    </form>    
</x-layout>