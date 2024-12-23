<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Transaction;
use App\Models\Product;

class Transaction_detail extends Model
{
    protected $table = 'transaction_details';
    protected $primarykey = 'id_detail_transaksi';
    protected $fillable = ['qty', 'harga'];
    public function Transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'id_transaksi', 'id_transaksi');
    }
    
    public function Product(): BelongsTo{
        return $this->BelongsTo(Product::class, 'id_barang', 'id_barang');
    }
}
