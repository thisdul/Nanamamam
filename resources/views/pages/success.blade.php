@extends('layouts.success')

@section('title')
    Nanamamam Success Page
@endsection

@section('content')
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="images/success.svg" alt="" class="mb-4" />
              <h2>Transaction Success!</h2>
              <p>
                Pesanan selesai! Silahkan cek riwayat transaksi anda.
                Pesanan akan diproses setelah anda melakukan pembayaran.
              </p>
              <div>
                <a href="{{ route('dashboard') }}" class="btn btn-success w-50 mt-4">Cek Riwayat Transaksi</a>
                <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-2">Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
