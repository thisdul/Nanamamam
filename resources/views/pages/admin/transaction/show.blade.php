@extends('layouts.admin')

@section('title')
    Nanamamam Dashboard Admin Transaction Details
@endsection

@section('content')

<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    @foreach ( $transaction as $transaction)

    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">#{{ $transaction->code }}</h2>
        <p class="dashboard-subtitle">Transaction Admin/ Details</p>
        </div>



        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-12 col-md-4">
                            <img
                                src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                class="w-50 mb-3"
                                alt=""
                            />
                            </div> --}}

                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Customer Name</div>
                                        <div class="product-subtitle">
                                            {{ $transaction->transaction->user->name }}
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 col-md-6">
                                        <div class="product-title">Product Name</div>
                                        <div class="product-subtitle">{{ $transaction->product->name }}</div>
                                    </div> --}}
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">
                                            Date of Transaction
                                        </div>
                                        <div class="product-subtitle">{{ $transaction->created_at }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Product Name</div>
                                        <div class="product-subtitle">
                                            {{ $transaction->product->name}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Jumlah</div>
                                        <div class="product-subtitle">
                                            {{ $transaction->portions}}
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 col-md-6">
                                        <div class="product-title">Total Amount</div>
                                        <div class="product-subtitle">Rp {{ number_format($transaction->transaction->total_price) }}</div>
                                    </div> --}}
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Amount</div>
                                        <div class="product-subtitle">Rp {{ number_format($transaction->price) }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">User Phone Number</div>
                                        <div class="product-subtitle">{{ $transaction->transaction->user->phone_number }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Address 1</div>
                                        <div class="product-subtitle">{{ $transaction->transaction->user->address_one }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Address 2</div>
                                        <div class="product-subtitle">{{ $transaction->transaction->user->address_two }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Kecamatan</div>
                                        <div class="product-subtitle">
                                            {{-- {{ App\Models\District }} --}}
                                            {{ App\Models\District::findOrFail($transaction->transaction->user->district)->name ?? null}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="product-title">Kelurahan</div>
                                        <div class="product-subtitle">
                                            {{ App\Models\Village::findOrFail($transaction->transaction->user->village)->name ?? null}}

                                        </div>
                                    </div>

                                    {{-- <div class="col-12 col-md-6">
                                        <div class="product-title">Akan dikirim pada</div>
                                        <div class="product-subtitle">{{ $transaction->transaction->shipping_date}}</div>
                                    </div> --}}
                                    {{-- <div class="col-12 col-md-6">
                                        <div class="product-title">Kontak</div>
                                        <div class="product-subtitle"><a href="https://wa.me/895356310521">Contact me!</a></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        {{-- <form action="{{ route('dashboard-transaction-upload', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-12 mt-5">
                                <h5>
                                    Info Pembayaran
                                </h5>


                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <img
                                            src="{{ asset('images/logobank.jpg') }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="product-title">BRI - A/N Fadhilah Nur Amaliah</div>
                                        <div class="product-subtitle"> 013901192320501</div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="product-title">BNI - A/N Fadhilah Nur Amaliah</div>
                                        <div class="product-subtitle"> 0573321352</div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="product-title">Kirim Bukti Transfer di Sini</div>
                                        <input type="file" name="gambar_bukti" id="gambar_bukti" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button
                                        type="submit"
                                        class="btn btn-success btn-block mt-4">
                                            Kirim
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <a href="{{ url('assets/bukti', $transaction->gambar_bukti)}}" style="color:black">Lihat Bukti</a> --}}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    </div>


@endsection
