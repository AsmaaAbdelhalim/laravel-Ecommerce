<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $guard = 'web';
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
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    protected $casts = [
        'addresses' => 'json',
        'default_address' => 'json',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
