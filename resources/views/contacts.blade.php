<x-layout>
    <x-slot:header>Contacts</x-slot>

    <!-- Jika tidak ada kontak, tampilkan pesan -->
    @if ($contact->isEmpty())
        <div class="text-center text-gray-500">
            <p>No contacts found. Please add a contact.</p>
        </div>
    @else
        <!-- Daftar kontak menggunakan grid layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            @foreach ($contact as $kontak)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Gambar Kontak -->
                    <img class="w-full h-48 object-cover" src="https://picsum.photos/100/100?random={{ rand() }}" alt="">
                    
                    <!-- Informasi Kontak -->
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $kontak['nama'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $kontak['alamat'] }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Phone: {{ $kontak['telepon'] }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Email: {{ $kontak['email'] }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Birthday: {{ $kontak['lahir'] }}</p>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-between p-4 bg-gray-100">
                        <div class="flex space-x-5 ml-auto">
                            <!-- Edit Button -->
                            <button onclick="location.href='{{ route('contacts.edit', $kontak['id']) }}'" class="text-blue-600 hover:text-blue-800 font-medium">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('contacts.destroy', $kontak['id']) }}" method="POST">
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
    @endif

    <!-- Tombol "Tambah Kontak" di bawah daftar kontak -->
    <div class="mt-8 text-center">
        <button onclick="location.href='{{ route('contacts.create') }}'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Tambah Kontak
        </button>
    </div>
</x-layout>
