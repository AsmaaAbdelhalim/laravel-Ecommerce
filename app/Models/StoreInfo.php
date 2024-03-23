<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'currency',
        'time_zone',
        'email',
        'description',
        'country',
        'country_code',
    ];
}
