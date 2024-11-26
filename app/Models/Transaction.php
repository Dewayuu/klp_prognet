<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    public function customer(): BelongsTo
    {
       return  $this->BelongsTo(Customer::class, 'id_pelanggan', 'id_pelanggan');
    }
    
}
