<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
// use Symfony\Component\CssSelector\Node\FunctionNode;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;


class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // simpan user data
        $user = Auth::user();
        $user -> update($request->except('total_price'));

        // Proses checkout
        $code = 'NANAMAMAM-' .mt_rand(000000, 11111);
        $carts = Cart::with(['product','user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();

        // Transaction create

        $transaction = Transaction::create([

            'users_id' => Auth::user()->id,
            'shipping_date' => $request->shipping_date,
            'delivery_fee' => 25000,
            // 'shipping_method' => 'ANTAR',
            'total_price' => $request->total_price,
            // Hapus !!!
            // 'total_product' => $request->portion,
            'transaction_status' => 'PENDING',
            'code' => $code


        ]);

        // TransactionDetail Create

        foreach ($carts as $cart) {
            // buat code transaksi
            $trx = 'TRX-' . mt_rand(00000, 11111);

             TransactionDetail::create([

                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'code' => $trx


        ]);
        }

        // hapus cart
        Cart::where('users_id', Auth::user()->id)->delete();

        // konfigurasi midtrans
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // $data = Config::$serverKey=config('midtrans.serverKey');
        // dd($data);

        $midtrans = [
            'transaction_details' =>[
                'order_id'=> $code,
                'gross_amount' =>(int) $request->total_price,

            ],

            'customer_details' =>[
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],

            // untuk pembayaran hanya untuk gopay dan bank transfer

            'enabled_payments' =>[
                'gopay', 'permata_va', 'bank_transfer'

            ],

            'vtweb' => [

            ]

        ];

        try {
                // Get Snap Payment Page URL
                $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

                // Redirect to Snap Payment Page
                return redirect($paymentUrl);

            }
                catch (Exception $e) {
                echo $e->getMessage();
            }







        // return redirect()->route('cart');

        // // return dd($transaction);

    }

    public Function callback(Request $request)
    {
        // set configurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');


        // Instance Midtrans Notification
        $notification = new Notification();

        // Assign ke variabel untuk memudahkan coding
        $status = $notification -> transaction_status;
        $type= $notification -> payment_type;
        $fraud= $notification -> fraud_status;
        $order_id= $notification -> order_id;

        // cari transaksi berdasarkan ID
        $transaction = Transaction::where('code', $order_id)->first();

        // Handle Notifikasistatus
        if($status =='capture') {
            if($type =='credit_card') {
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }else{
                    $transaction->status =  'SUCCESS';
                }
            }
        }

        elseif($status == 'settlement'){
            $transaction->transaction_status = 'SUCCESS';
        }
        elseif($status == 'pending'){
            $transaction->transaction_status = 'PENDING';
        }
        elseif($status == 'deny'){
            $transaction->transaction_status ='CANCELLED';
        }
        elseif($status == 'expire'){
            $transaction->transaction_status ='CANCELLED';
        }
        elseif($status == 'cancel'){
            $transaction->transaction_status = 'CANCELLED';
        }

        // Simpan transaksi
        $transaction->save();


    }
}
