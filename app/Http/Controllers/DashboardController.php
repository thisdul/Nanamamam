<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TransactionDetail;
use App\Models\User;



class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // logic untuk menampilkan data transaksi yg masuk

        $transactions = Transaction::with(['transactiondetail','user'])
                        ->where('users_id', Auth::user()->id)->get();


        // $transactions = TransactionDetail::with(['transaction.user','product.galleries'])
        //                 ->whereHas('transaction', function($transaction){
        //                     $transaction->where('users_id', Auth::user()->id);

        //                 });

        // $customer = User::count();

        // $revenue = $transactions->get()->reduce(function ($carry, $item){
        //     return $carry + $item->price;
        // });


        return view('pages.dashboard',[
            'transaction_data' => $transactions


        ]);

        return view('pages.dashboard');




    }
}
