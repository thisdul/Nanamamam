<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // panggil kategori dan produk di halmmana depan
        $categories = Category::all();
        // paginate products
        $products = Product::with(['galleries'])->paginate(32);


        return view('pages.category',[

            'categories'=> $categories,
            'products'=> $products
        ]);


    }

    // untuk kategori halmaan detail
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request, $slug)
    {
        // panggil kategori dan produk di halmmana depan
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        // paginate products
        $products = Product::with(['galleries'])->where('categories_id', $category->id)->paginate(32);


        return view('pages.category',[

            'categories'=> $categories,
            'products'=> $products
        ]);


    }


}

