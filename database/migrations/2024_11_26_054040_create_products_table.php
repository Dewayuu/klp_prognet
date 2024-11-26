<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode');  // Menggunakan string untuk kode (varchar)
            $table->string('nama');  // Menggunakan string untuk nama produk
            $table->decimal('harga', 8, 2);  // Menggunakan decimal untuk harga (8 digit total, 2 di desimal)
            $table->integer('stok');  // Menggunakan integer untuk stok
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
