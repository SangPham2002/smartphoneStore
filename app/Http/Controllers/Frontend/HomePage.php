<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function homePage(){
        $products = Product::paginate(8)->where('stock', 0);
        $productStock= Product::paginate(8)->where('stock', 1);
        $category = Category::all();
        return view('layouts.homePage', compact('products','category', 'productStock'));
    }
    public function shop(){
        $products = Product::paginate(9);
        $category = Category::all();
        return view('layouts.shop', compact('products','category'));
    }
}
