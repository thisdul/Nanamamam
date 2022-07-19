<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries'])->where('slug', $id)->firstOrFail();

        return view('pages.detail',[
            'product' => $product
        ]);

    }

    public function add(Request $request, $id)
    {

            $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'portion' => $request->input('portion')
            ];


            Cart::create($data);



            return redirect()->route('cart');


    }

    // public function add(Request $request, $id)
    // {
    //     $cart = Cart::where('products_id', $id)->where('users_id', Auth::user()->id);

    //     if($cart->count()){
    //         $cart-> increment('portion');
    //         $cart = $cart->first();
    //     }else{

    //         $data = [
    //         'products_id' => $id,
    //         'users_id' => Auth::user()->id,
    //         'portion' => 1
    //         ];

    //         Cart::create($data);


    //     }


    //         return redirect()->route('cart');

    // }
}
