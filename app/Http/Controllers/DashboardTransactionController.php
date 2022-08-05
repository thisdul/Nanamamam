<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        // $sellTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
        //                 ->whereHas('product', function($product){

        //                 })->get();

        // Transaction::with('transactiondetail', 'user');

        $buyTransactions = Transaction::with(['transactiondetail','user'])
                        ->where('users_id', Auth::user()->id)->get();



        // $buyTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
        //                 ->whereHas('transaction', function($transaction){
        //                     $transaction->where('users_id', Auth::user()->id);

        //                 })->get();

                        // dd($buyTransactions);

        return view('pages.dashboard-transactions',[
            'buyTransactions' => $buyTransactions
        ]);
    }

    public function details(Request $request, $id)
    {

         $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                     ->where('transactions_id', $id)->get();

        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction
        ]);


        // $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
        //                     ->findOrFail($id);
        //                     // dd($transaction);
        // return view('pages.dashboard-transactions-details',[
        //     'transaction'=>$transaction


        // ]);
    }

    // upload gambar bukti tf
    // public function upload(Request $request, $id)
    // {
    //     $item = TransactionDetail::find($id);
    //     $bukti = $request->gambar_bukti;
    //     if($bukti){
    //         $nama = 'Bukti Bayar-' . $item->id . '.png';

    //         $dtUpload = $item;
    //         $dtUpload->gambar_bukti= $nama;

    //         $bukti->move(public_path() . '/assets/bukti', $nama);
    //         $dtUpload->save();

    //     }else{
    //         return back();
    //     }

    //     return back([
    //         'item'=>$item
    //     ]);


    // }






    // public function upload(Request $request, $id)
    // {
    // //     $data = $request->all();

    // //     $data['photos'] = $request->file('photos')->store('assets/product', 'public');

    // //     ProductGallery::create($data);

    // //     return redirect()->route('dashboard-transaction');
    // // }







}
