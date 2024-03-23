<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'accepts_marketing',
        'first_name',
        'last_name',
        'orders_count',
        'state',
        'total_spent',
        'last_order_id',
        'verified_email',
        'phone',
        'last_order_name',
        'currency',
        'addresses',
        'default_address',
        'registered_at',
        'gender',
    ];

    protected $casts = [
        'addresses' => 'json',
        'default_address' => 'json',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
