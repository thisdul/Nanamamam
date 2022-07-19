@extends('layouts.admin')

@section('title')
    Transaction
@endsection

@section('content')
  <!-- section content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
    <h2 class="dashboard-title">Transaction</h2>
    <p class="dashboard-subtitle">List of Transaction</p>
    </div>
    <div class="dahsboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        {{-- <th>Dibuat</th> --}}
                                        <th>Tanggal Pengiriman</th>
                                        <th>Alamat1</th>
                                        <th>Alamat2</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',

            },
            columns: [
                { data: 'id', name: 'id'},
                { data: 'user.name', name: 'user.name'},
                { data: 'total_price', name: 'total_price'},
                { data: 'transaction_status', name: 'transaction_status'},
                // { data: 'created_at', name: 'created_at'},
                { data: 'shipping_date', name: 'shipping_date'},
                { data: 'user.address_one', name: 'user.address_one'},
                { data: 'user.address_two', name: 'user.address_two'},


                {

                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'

                },
            ]
        })
    </script>

@endpush