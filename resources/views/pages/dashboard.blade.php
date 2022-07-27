@extends('layouts.dashboard')

@section('title')
    Nanamamam Dashboard
@endsection

@section('content')
  <!-- section content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
    <h2 class="dashboard-title">Dashboard</h2>
    <p class="dashboard-subtitle">Mari lihat history belanja mu!</p>
    </div>
    <div class="dahsboard-content">
    <div class="row">
        <div class="col-12 mt-2">
        <h5 class="mb-3">Transaksi Terakhir</h5>
        @foreach ($transaction_data as $transaction )

            {{-- <a
            href="{{ route('dashboard-transaction-details', $transaction->id) }}"
            {{-- href="{{ route('dashboard-transaction-details') }}" --}}
            {{-- class="card card-list d-block"
            >
                <div class="card-body">
                <div class="row">
                    <div class="col-md-1">
                    <img src="{{Storage::url($transaction->product->galleries->first()->photos ?? '')}}" class="w-50" />
                    </div>
                    <div class="col-md-4">{{ $transaction->product->name ?? '' }}</div>
                    {{-- <div class="col-md-3">{{$transaction->product->portion ?? '' }} Porsi</div> --}}
                    {{-- <div class="col-md-6">{{ $transaction->created_at ?? '' }}</div>
                    <div class="col-md-1 d-none d-md-block">
                    <img src="{{ asset('images/dashboard-panah.svg') }}" alt="" />
                    </div>
                </div>
                </div>
            </a>



            {{-- href="{{ route('dashboard-transaction-details') }}" --}}
            <div class="card card-list d-block"
            >
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img src="{{Storage::url($transaction->product->galleries->first()->photos ?? '')}}" class="w-50" />
                        </div>
                        <div class="col-md-4">{{ $transaction->product->name ?? '' }}</div>
                        <div class="col-md-6">{{ $transaction->created_at ?? '' }}</div>
                        <div class="col-md-1 d-none d-md-block">
                            <a href="{{ route('dashboard-transaction-details'), $transaction->id }}">
                                <img src="{{ asset('images/dashboard-panah.svg') }}" alt=""/>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        </div>
    </div>
    </div>
</div>
</div>

@endsection
