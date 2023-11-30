<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class storeProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|min:5|max:20|unique:products",
            "image"=> "image",
            "price"=> "required|min:4|max:10",
        ];
    }
    public function messages():array{
        return [
            'name.required'=>'Vui lòng điền tên sản phẩm',
            'name.unique'=>"$this->name đã tồn tại",
            "price.required"=> "Giá sản phẩm không vượt quá mức quy định!",
            "price.min"=> "Giá sản phẩm không vượt quá mức quy định!",
            "price.max"=> "Giá sản phẩm không vượt quá mức quy định!",
        ];
    }
}
