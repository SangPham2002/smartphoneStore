<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function homePage()
    {
        $products = Product::paginate(16)->where('stock', 0);
        $productStock = Product::paginate(16)->where('stock', 1);
        $category = Category::all();
        return view('layouts.homePage', compact('products', 'category', 'productStock'));
    }
    public function shop()
    {
        $categories = Category::withCount('products')->get();
        $products = Product::paginate(9);
        return view('layouts.shop', compact('categories', 'products'));
    }
    public function detail($slug)
    {
        $productStock = Product::all()->where('stock', 1);
        $product = Product::where('slug', $slug)->first();
        return view('layouts.detail-product', compact('product','productStock'));
    }
}
