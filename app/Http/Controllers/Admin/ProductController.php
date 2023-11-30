<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\storeProductRequest;
use App\Models\Category;
use App\Models\ImgProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.list', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProductRequest $request)
{
    try {
        // Kiểm tra và xử lý ảnh chính
        if ($request->hasFile('image')) {
            $product = new Product($request->all());
            $image = $request->file('image');
            $imageName = $request->productname . '_' . $image->hashName();
            $product->image = $image->storeAs('images/products', $imageName);
            $product->save();
        }

        // Kiểm tra và xử lý ảnh phụ
        if ($request->hasFile('images')) {
            $product = isset($product) ? $product : Product::create($request->all());

            $mainImage = $request->file('image');
            $mainImageFileName = $mainImage->getClientOriginalName();
            $mainImage->storeAs('images/products', $mainImageFileName);
            $request->merge(['image' => $mainImageFileName]);

            foreach ($request->file('images') as $image) {
                $fileName = $image->getClientOriginalName();
                $image->storeAs('images/products', $fileName);

                ImgProduct::create([
                    'product_id' => $product->id,
                    'image' => $fileName
                ]);
            }
        }
    } catch (\Exception $e) {
        // Xử lý lỗi nếu có
        // return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }

    return redirect()->route('product.index')->with('success', 'Thêm mới thành công!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
