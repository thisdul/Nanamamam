@extends('layouts.success')

@section('title')
    Nanamamam Regist Success Page
@endsection

@section('content')
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="{{ asset('images/register_success.svg') }}" alt="" class="mb-4" />
              <h2>Welcome to Nanamamam!</h2>
              <p>
                Sekarang anda sudah terdaftar di Nanamamam.
                Selamat menjelajah makanan!!
              </p>
              <div>
                <a href="{{ route('dashboard') }}" class="btn btn-success w-50 mt-4">My Dashboard</a>
                <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-2">Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
