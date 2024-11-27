<x-layout>
    <x-slot:header>Edit Satuan</x-slot>
    <body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
        <div style="max-width: 600px; margin: 2rem auto; padding: 1rem; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 1.5rem; font-weight: bold; text-align: center; margin-bottom: 1rem;">Edit Satuan</h2>

            <!-- Form Edit Satuan -->
            <form action="{{ route('measurements.update', $measurement->id_satuan) }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                @csrf
                @method('PUT')

                <!-- Input Nama Satuan -->
                <div>
                    <label for="nama_satuan" style="display: block; font-size: 14px; margin-bottom: 8px; font-weight: bold;">Nama Satuan:</label>
                    <input type="text" name="nama_satuan" id="nama_satuan" required
                        value="{{ old('nama_satuan', $measurement->nama_satuan) }}"
                        style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px;"
                        placeholder="Masukkan nama satuan (misal: Kilogram, Meter)">
                </div>

                <!-- Tombol Submit -->
                <div style="display: flex; justify-content: space-between;">
                    <button type="button" onclick="location.href='{{ route('measurements.index') }}'"
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
        </div>
    </body>
</x-layout>
