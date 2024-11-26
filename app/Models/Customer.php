<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $table = 'customers'; // Wajib jika nama tabel tidak mengikuti konvensi
    protected $primaryKey = 'id_pelanggan'; // Wajib jika primary key bukan 'id'
    protected $fillable = ['nama', 'alamat', 'telepon'];

    public function Measurement(): HasMany
    {
        return $this->hasMany(Transaction::class, 'id_pelanggan','id_pelanggan');
    }
}
