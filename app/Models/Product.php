<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Measurement;
use App\Models\Transaction_detail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama', 'harga', 'stok','id_satuan'];
    
    public function Measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'id_satuan', 'id_satuan');
    }
    
    public function Transaction_detail(): HasMany
    {
        return $this->hasMany(Transaction_detail::class, 'id_barang', 'id_barang');
    }
}
