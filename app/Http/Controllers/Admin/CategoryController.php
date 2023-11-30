<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\storeCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /** VIEW CÁC CHỨC NĂNG CỦA CATEGORY **/
    //Hiển thị list danh mục
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }
    //View tạo mới danh mục
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }
    /**              END                **/

    /** HOẠT ĐỘNG CỦA CHỨC NĂNG CATEGORY **/
    //Tạo mới danh mục
    public function store(storeCategoryRequest $request)
    {
        try {
            Category::create($request->all());
            return redirect()->route('category.index')->with('success', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Thêm mới thất bại');
        }
    }

    //Chỉnh sửa danh mục
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    //Update Danh Mục
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return redirect()->route('category.index')->with('success', 'Cập nhập thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Cập nhập thất bại');
        }
    }

    //Xóa ảo Danh Mục
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }

    //Restore Mục đã xóa
    public function trash(){
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('categories'));
    }
    public function restore( $id ){
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('category.index')->with('success', 'Khôi phục thành công');
    }
    //Xóa vĩnh viễn Danh Mục
    public function forceDelete( $id ){
        Category::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('category.trash')->with('success', 'Xóa thành công');
    }
    /**              END                **/
}
