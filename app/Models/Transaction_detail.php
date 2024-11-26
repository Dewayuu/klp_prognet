<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Transaction;
use App\Models\Product;

class Transaction_detail extends Model
{
    public function Transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'id_transaksi', 'id_transaksi');
    }
    
    public function Product(): HasMany{
        return $this->hasMany(Product::class, 'id_produk', 'id_produk');
    }
}
