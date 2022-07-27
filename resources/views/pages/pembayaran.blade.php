@extends('layouts.app')

@section('title')
    Nanamamam Cart Page
@endsection

@section('content')
     <!-- Page content -->

    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.html"> Home </a>
                  </li>
                  <li class="breadcrumb-item ">Cart</li>
                  <li class="breadcrumb-item active">Pembayaran</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">

          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Pembayaran</h2>
            </div>
          </div>

          <form action="{{ route('pembayaran', $transaction->id) }}" method="POST" enctype="multipart/form-data">
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
                        <a href="{{ url('assets/bukti', $transaction->gambar_bukti)}}" style="color:black">Lihat Bukti</a>

          <form action="{{ route('pembayaran') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="address_one">Alamat 1</label>
                    <input
                    type="text"
                    class="form-control"
                    id="address_one"
                    name="address_one"
                    value="Kartini"
                    />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="address_two">Alamat 2</label>
                    <input
                    type="text"
                    class="form-control"
                    id="address_two"
                    name="address_two"
                    value="Hambali"
                    />
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label for="district">Kecamatan</label>
                    <select name="district" id="district" class="form-control" v-if="districts" v-model="districts_id">
                    <option v-for="district in districts" :value="district.id"> @{{ district.name }} </option>
                    </select>
                    <select v-else class="form-control"></select>
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label for="village">Kelurahan</label>
                    <select name="village" id="village" class="form-control" v-if="villages" v-model="villages_id">
                    <option v-for="village in villages" :value="village.id"> @{{ village.name }} </option>
                    </select>
                    <select v-else class="form-control"></select>
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label for="zip_code">Kode Pos</label>
                    <input
                    type="text"
                    class="form-control"
                    id="zip_code"
                    name="zip_code"
                    value="17113"
                    />
                </div>
                </div>
                {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="methodKirim">Metode Pengiriman</label>
                    <select
                    name="methodKirim"
                    id="methodKirim"
                    class="form-control"
                    >
                    <option value="Jemput">Ambil Sendiri</option>
                    <option value="Delivery">Bekasi - Rp. 50.000</option>
                    </select>
                </div>
                </div> --}}
                <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Nomor Hp</label>
                    <input
                    type="text"
                    class="form-control"
                    id="phone_number"
                    name="phone_number"
                    value="+62 52419118"
                    />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="shipping_date">Tanggal Pengiriman</label>
                    <input
                    type="date"
                    class="form-control"
                    id="shipping_date"
                    name="shipping_date"
                    min="2022-07-01"
                    />
                </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="note">Catatan untuk Penjual</label>
                        <textarea name="note" id="note"></textarea>
                    </div>
                </div> --}}


            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                <hr />
                </div>
                <div class="col-12">
                <h2 class="mb-2">Informasi Pembayaran</h2>
                </div>
            </div>

             {{-- @php
              $ongkir = 25000
            @endphp --}}

            {{-- @if ($kota == 'BEKASI TIMUR')
              $ongkir = 30000
            @elseif ($kota == 'BEKASI BARAT')
              $ongkir = 50000
            @elseif ($kota == 'BEKASI SELATAN')
              $ongkir = 50000
            @elseif ($kota == 'BEKASI UTARA')
              $ongkir = 50000
            @elseif ($kota == 'RAWALUMBU')
              $ongkir = 15000
            @elseif ($kota == 'MUSTIKA JAYA')
              $ongkir = 45000
            @elseif ($kota == 'MEDAN SATRIA')
              $ongkir = 45000
            @elseif ($kota == 'PONDOK GEDE')
              $ongkir = 100000
            @elseif ($kota == 'JATISAMPURNA')
              $ongkir = 100000
            @elseif ($kota == 'PONDOKMELATI')
               $ongkir = 100000
            @elseif ($kota == 'JATIASIH')
              $ongkir = 75000
            @else
              $ongkir = 45000
            @endif --}}

            {{-- @php
              $totalPrice += $ongkir
            @endphp --}}
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                {{-- <div class="col-4 col-md-4">
                <div class="product-title">Rp {{ number_format($ongkir )}}</div>
                <div class="product-subtitle" >Delivery fee</div>
                </div> --}}
                {{-- <div class="col-4 col-md-4">
                <div class="product-title">Rp 1.500.000</div>
                <div class="product-subtitle">Prices</div>
                </div> --}}
                <div class="col-4 col-md-4">
                <div class="product-title text-success">Rp {{ number_format($totalPrice ??0) }}</div>
                <div class="product-subtitle">Total</div>
                </div>

                <div class="col-8 col-md-4">
                <button type="submit" class="btn btn-success mt-4 px-4 btn-block"
                    >Checkout Now</button
                >
                </div>
            </div>
          </form>
        </div>
      </section>
    </div>


@endsection

