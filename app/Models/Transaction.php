<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Transaction_detail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = true; // Jika primary key auto increment
    protected $keyType = 'int';  // Tipe data primary key
    protected $fillable = ['total', 'harga', 'tanggal', 'id_pelanggan'];
    
    public function customer(): BelongsTo
    {
       return  $this->BelongsTo(Customer::class, 'id_pelanggan', 'id_pelanggan');
    }
    
    public function transactionDetails(): HasMany
    {
        return $this->hasMany(Transaction_detail::class, 'id_transaksi', 'id_transaksi');
    }

}
