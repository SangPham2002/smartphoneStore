<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\storeProductRequest;
use App\Http\Requests\Product\updateProductRequest;
use App\Models\Category;
use App\Models\ImgProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function edit(Product $product, Category $category)
    {
        $products = Product::with('gallery')->find($product);
        $categories = Category::all();
        return view('admin.products.edit', compact('products', 'product', 'categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateProductRequest $request, string $id)
    {
        $createEdit = Product::find($id);
        if ($request->hasFile("image")) {
            // if (File::exists("image/" . $createEdit->cover)) {
            //     File::delete("image/" . $createEdit->cover);
            // }
            $file = $request->file("image");
            $createEdit->image = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/image"), $createEdit->image);
            $request['image'] = $createEdit->image;
        }

        $createEdit->update([
            "name" => $request->name,
            "price" => $request->price,
            "sale_price" => $request->sale_price,
            "category_id" => $request->category_id,
            "slug" => $request->slug,
            "description" => $request->description,
            "stock" => $request->stock,
            "status" => $request->status,
            "image" => $createEdit->image,
        ]);
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $imgData = new ImgProduct();
                $imgData->images = $imageName;
                $imgData->product_id = $id;

                $file->move(\public_path("/images"), $imageName);
                $imgData->save();
            }
        }
        return redirect()->route('product.index')->with('success', 'Cập nhập thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product);
        // Kiểm tra xem sản phẩm có tồn tại hay không
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
        // Lấy ảnh liên quan đến sản phẩm
        $productImage = $product->image()->first();
        // Xóa tất cả ảnh liên quan đến sản phẩm
        if ($productImage) {
            // Xóa ảnh từ storage
            Storage::delete('storage/images/' . $productImage->filename);

            // Xóa ảnh từ bảng img_products
            $productImage->delete();
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
