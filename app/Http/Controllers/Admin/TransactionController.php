<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Support\Facades\Facade;
use Yajra\DataTables\Facades\DataTables;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            // $query = Transaction::with(['user', 'transactiondetail']);
            // $query = Transaction::with(['transactiondetail']);
            $query = Transaction::with('transactiondetail', 'user');

            // return $this->dataTable



            return DataTables::of($query)
                ->addColumn('action', function($item){
                    // return $item->transactiondetail->map(function($transaction_details){

                        return
                        '
                            <div class="btn-group">
                                <div class="dropdown">
                                    <button class=" btn btn-primary dropdown-toggle mr-1 mb-1
                                            type="button"
                                            data-toggle="dropdown">
                                            Aksi
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="' . route('transaction.edit', $item->id). '">
                                            Sunting
                                        </a>
                                        <a class="dropdown-item" href="' . route('transaction.show', $item->id). '">
                                            Show
                                        </a>
                                        <form action="'. route('transaction.destroy', $item->id) .'" method="POST">
                                            ' . method_field('delete') . csrf_field() .'
                                            <button type="submit" class="dropdown-item text-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';


                    // });
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('pages.admin.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // $data = $request->all();

                // // proses upload fotonya
                // // data photos adalah field yang mau kita simpan ke database
                // // lalu ambil file photos dengan request
                // // filenya store / simpan ke folder assers/product, taruh di folder public
                // $data['photos'] = $request->file('photos')->store('assets/transaction', 'public');

                // Transaction::create($data);

                // return redirect()->route('product-gallery.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $query = Transaction::with('transactiondetail, user');
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                     ->where('transactions_id', $id)->get();

        return view('pages.admin.transaction.show', [
            'transaction' => $transaction
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);


        return view('pages.admin.transaction.edit', [
            'item' => $item

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }
}
