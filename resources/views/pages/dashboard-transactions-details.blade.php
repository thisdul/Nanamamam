@extends('layouts.dashboard')

@section('title')
    Nanamamam Dashboard Transaction Details
@endsection

@section('content')

<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">#{{ $transaction->code }}</h2>
        <p class="dashboard-subtitle">Transaction / Details</p>
        </div>
        <!-- dikasi id karena untuk digunakan vuejs -->
        <div class="dashboard-content" id="transactionDetails">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                            <img
                                src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                class="w-50 mb-3"
                                alt=""
                            />
                            </div>

                            <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                <div class="product-title">Customer Name</div>
                                <div class="product-subtitle">
                                    {{ $transaction->transaction->user->name }}
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="product-title">Product Name</div>
                                <div class="product-subtitle">{{ $transaction->product->name }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="product-title">
                                    Date of Transaction
                                </div>
                                <div class="product-subtitle">{{ $transaction->created_at }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="product-title">Status Transaksi</div>
                                <div class="product-subtitle text-danger">
                                    {{ $transaction->transaction->transaction_status }}
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="product-title">Total Amount</div>
                                <div class="product-subtitle">Rp {{ number_format($transaction->transaction->total_price) }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="product-title">Mobile</div>
                                <div class="product-subtitle">{{ $transaction->transaction->user->phone_number }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="product-title">Akan dikirim pada</div>
                                <div class="product-subtitle">{{ $transaction->transaction->shipping_date}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="product-title">Kontak</div>
                                <div class="product-subtitle"><a href="https://wa.me/895356310521">Contact me!</a></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- <form action="{{ route('dashboard-transaction-upload', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-4">
                                <h5>No. Rekening</h5>
                                <div class="product-subtitle"> BCA: 12345678 / BNI: 12345678</div>
                            </div>
                            <div class="col-12 col-md-3">
                                <label>Send here!</label>
                                <input type="file" name="foto_bukti" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-2">
                                <button
                                type="submit"
                                class="btn btn-success btn-block mt-4">
                                    Kirim Bukti
                                </button>
                            </div>

                        </div>
                    </form> --}}
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@push('addon-script')
    <script src="{{ asset('vendor/vue/vue.js') }}"></script>
    <script>
        var transactionDetails = new Vue({
            el: "#transactionDetails",
            data: {
                status: "DIKIRIM",
            },
        });
    </script>
@endpush
