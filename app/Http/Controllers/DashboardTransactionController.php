<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        // $sellTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
        //                 ->whereHas('product', function($product){

        //                 })->get();

        $buyTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->whereHas('transaction', function($transaction){
                            $transaction->where('users_id', Auth::user()->id);

                        })->get();

                        // dd($buyTransactions);

        return view('pages.dashboard-transactions',[
            'buyTransactions' => $buyTransactions
        ]);
    }

    public function details(Request $request, $id)
    {


        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                            ->findOrFail($id);
                            // dd($transaction);
        return view('pages.dashboard-transactions-details',[
            'transaction'=>$transaction
        ]);
    }

    // public function upload(Request $request, $id)
    // {
    // //     $data = $request->all();

    // //     $data['photos'] = $request->file('photos')->store('assets/product', 'public');

    // //     ProductGallery::create($data);

    // //     return redirect()->route('dashboard-transaction');
    // // }







}
