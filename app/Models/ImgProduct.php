<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'image'];

    public function cateRoom(){
        return $this->belongsTo(Product::class);
    }
}
