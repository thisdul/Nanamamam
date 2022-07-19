@extends('layouts.admin')

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
    <h2 class="dashboard-title">Admin Dashboard</h2>
    <p class="dashboard-subtitle">This is Nanamamam Admin Dashboard</p>
    </div>
    <div class="dahsboard-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Customer</div>
                        <div class="dashboard-card-subtitle">{{ $customer }}</div>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Revenue</div>
                        <div class="dashboard-card-subtitle">Rp {{ number_format($revenue) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
