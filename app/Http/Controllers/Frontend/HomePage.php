<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function homePage(Cart $cart)
    {
        
        $products = Product::paginate(16)->where('stock', 0);
        $productStock = Product::paginate(16)->where('stock', 1);
        $category = Category::all();
        return view('layouts.homePage', compact('products', 'category', 'productStock', 'cart'));
    }
    public function footerPage()
    {
        $products = Product::paginate(16)->where('stock', 0);
        $productStock = Product::paginate(16)->where('stock', 1);
        $category = Category::all();
        return view('layouts.footerPage', compact('products', 'category', 'productStock'));
    }
    public function shop(Cart $cart)
    {
        $categories = Category::withCount('products')->get();
        $products = Product::paginate(9);
        return view('layouts.shop', compact('categories', 'products', 'cart'));
    }
    public function detail($slug)
    {
        $productStock = Product::all()->where('stock', 1);
        $product = Product::where('slug', $slug)->first();
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('layouts.detail-product', compact('product', 'productStock', 'related'));
    }
}
