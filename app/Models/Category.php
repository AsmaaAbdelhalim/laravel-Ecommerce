<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','taxonomy','handle','content','published_at','available','image', 'sort_order', 'template_suffix'];

    protected static function boot()
    {
        //parent::boot();
        static::creating(function ($category)
        {
            Log::info('Creating Category: '.' with data:'.json_encode($category));
        });
        static::updated(function ($category)
        {
            Log::info('updated Category: '.' with data:'.json_encode($category));
        });
        static::deleted(function ($category)
        {
            Log::info('deleted Category: '.' with data:'.json_encode($category));
        });
    }
}
