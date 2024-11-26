<x-layout>
    <x-slot:header>Daftar Pelanggan</x-slot>
        <!-- Daftar kontak menggunakan grid layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            @foreach ($cust as $pelanggan)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Informasi Kontak -->
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $pelanggan['id_pelanggan'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $pelanggan['nama'] }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Alamat: {{ $pelanggan['alamat'] }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Telepon: {{ $pelanggan['telepon'] }}</p>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-between p-4 bg-gray-100">
                        <div class="flex space-x-5 ml-auto">
                            <!-- Edit Button -->
                            <button onclick="location.href='{{ route('customers.edit', $pelanggan['id_pelanggan']) }}'" class="text-blue-600 hover:text-blue-800 font-medium">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('customers.destroy', $pelanggan['id_pelanggan']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <!-- Tombol "Tambah Kontak" di bawah daftar kontak -->
    <div class="mt-8 text-center">
        <button onclick="location.href='{{ route('customers.create') }}'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Tambah Pelanggan
        </button>
    </div>
</x-layout>
