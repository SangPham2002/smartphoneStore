<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\storeProductRequest;
use App\Http\Requests\Product\updateProductRequest;
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

        $products = Product::paginate(5);
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
            // if ($request->hasFile("image")) {
            //     $file = $request->file("image");
            //     $imageName = time() . '_' . $file->getClientOriginalName();
            //     $file->move(\public_path("image/"), $imageName);
    
            //     $products = new Product([
            //         "name" => $request->name,
            //         "price" => $request->price,
            //         "sale_price" => $request->sale_price,
            //         "category_id" => $request->category_id,
            //         "slug" => $request->slug,
            //         "description" => $request->description,
            //         "stock" => $request->stock,
            //         "status" => $request->status,
            //         "image" => $imageName,
            //     ]);
            //     $products->save();
            // }
    
            // if ($request->hasFile("images")) {
            //     $files = $request->file("images");
            //     foreach ($files as $file) {
            //         $imageName = time() . '_' . $file->getClientOriginalName();
            //         $imgData = new ImgProduct;
            //         $imgData->images = $imageName;
            //         $imgData->product_id = $products->id;
    
            //         $file->move(\public_path("/images"), $imageName);
            //         $imgData->save();
            //     }
            // }
    
            // return redirect()->route('product.index')->with('success', 'Thêm mới thành công!');
        

        $fileName = $request->file('image')->getClientOriginalName();

        $request->merge(['image' => $fileName]);
        $request->file('image')->storeAs('public/images', $fileName);
        try {
            $dataInsert = [
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'image' => $fileName,
                'category_id' => $request->category_id,
                'slug' => $request->price,
                'description' => $request->description,
                'stock' => $request->stock,
            ];
            // dd($dataInsert);
            $product = Product::create($dataInsert);

            if ($product && $request->hasFile('images')) {
                foreach ($request->file('images') as $value) {
                    $imagePath = $value->getClientOriginalName();
                    $value->storeAs('public/images', $imagePath);

                    ImgProduct::create([
                        'product_id' => $product->id,
                        'image' => $imagePath,
                    ]);
                }
            }
           
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            dd($e);
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
    public function edit(Product $products, Category $category)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('products','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateProductRequest $request, Product $products)
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
