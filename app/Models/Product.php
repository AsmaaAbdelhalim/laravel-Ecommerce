<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $hidden = [
        'meta'
    ];
    protected $fillable = [
            'title',
            'image',
            'type',
            'vendor',
            'handle',
            'owner',
            'price',
            'compare_at_price',
            'stock_status',
            'quantity',
            'published_at',
            'tags',
            //'images',
            'full_permalink',
            'content',
            //'meta',
            'category_id',
            'image_id'
    ];

        public function categories()
        {
            return $this->belongsTo(Category::class);
        }

        public function images()
        {
            return $this->belongsTo(Image::class,'image_id');
        }
        // protected $casts = [
        //     'images' => 'json',
        // ];  
}
