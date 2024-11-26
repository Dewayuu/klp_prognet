<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Measurement extends Model
{
    public function Product(): HasMany
    {
        return $this->hasMany(Product::class, 'id_barang','id_barang');
    }
}
