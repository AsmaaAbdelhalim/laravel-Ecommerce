<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'product_id', 
        'name',
        'order_product_id',
        'model',
        'image',
       'quantity',
        'price',
        'total',
        'tax', 
    ];
    public function orders() {

        return $this->hasMany(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
