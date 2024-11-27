<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Measurement extends Model
{
    protected $table = 'measurements';
    protected $primaryKey = 'id_satuan';
    protected $fillable = ['nama_satuan'];
    
    public function Product(): HasMany
    {
        return $this->hasMany(Product::class, 'id_satuan','id_satuan');
    }
}
