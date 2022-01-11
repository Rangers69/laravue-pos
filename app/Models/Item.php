<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'barcode',
        'name',
        'categorie_id',
        'unit_id',
        'price',
        'stock'
    ];


}
