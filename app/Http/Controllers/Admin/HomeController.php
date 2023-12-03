<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $products = Product::paginate(3);
        $categories = Category::all();
        return view('admin.homeAdmin', compact('user', 'products', 'categories'));
    }
}
