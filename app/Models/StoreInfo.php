<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\StoreInfoEvent;
use App\Observers\StoreInfoObserver;

//use Illuminate\Support\Facades\Log;

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
