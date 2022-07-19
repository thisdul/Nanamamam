<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Models\User;
Use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $transactions = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->whereHas('product', function($product){

                        });

        $customer = User::count();

        $revenue = $transactions->get()->reduce(function ($carry, $item){
            return $carry + $item->price;
        });

        return view('pages.admin.dashboard',[
            'transaction_data' => $transactions->get(),
            'customer'=> $customer,
            'revenue'=> $revenue

        ]);

    //     $transactions = TransactionDetail::with(['transaction.user','product.galleries'])
    //                     ->whereHas('product', function($product){
    //                         $product->where('users_id', Auth::user()->id);

    //                     });

    //     $customer = User::count();

    //     $revenue = $transactions->get()->reduce(function ($carry, $item){
    //         return $carry + $item->price;
    //     });

    //     return view('pages.admin.dashboard',[
    //         'customer'=> $customer,
    //         'revenue'=> $revenue,
    //     ]);
    }
}
