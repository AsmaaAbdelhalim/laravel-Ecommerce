<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','taxonomy','handle','content','published_at','available','image', 'sort_order', 'template_suffix'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
