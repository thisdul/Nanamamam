<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required|max:255',
            // exists itu berfungsi biar ada, kalo gak ada gak akan bisa. Jadi masukin produk harus ada si categoriesnya
            'categories_id'=> 'required|exists:categories,id',
            'price'=> 'required|integer',
            'portion'=> 'required|integer',
            'description'=> 'required'
        ];
    }
}
