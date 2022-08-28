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



        $customer = User::count();

        $revenue = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');


        return view('pages.admin.dashboard',[
            'customer'=> $customer,
            'revenue'=> $revenue

        ]);


    }
}
