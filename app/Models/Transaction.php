<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'customer_id',
        'sales_order'
    ];

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

}
