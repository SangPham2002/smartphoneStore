<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'sale_price', 'image', 'category_id', 'slug', 'description', 'stock'];
    function gallery()
    {
        return $this->hasMany(ImgProduct::class, 'product_id');
    }
    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    function images()
    {
        return $this->hasMany(ImgProduct::class, 'product_id');
    }
}
