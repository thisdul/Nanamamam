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
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Total</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0
                    @endphp
                  @foreach ($carts as $cart )
                    <tr>
                        <td style="width: 13%;">
                            @if ($cart->product->galleries)
                                <img
                                    src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                    alt=""
                                    class="cart-image w-100"
                                />
                            @endif
                        </td>
                        <td style="width: 30%">
                        <div class="product-title">{{ $cart->product->name }}</div>
                        <div class="product-subtitle">Jumlah : {{ $cart->portion }}</div>
                        </td>
                        <td style="width: 30%">
                        <div class="product-title">Rp {{ number_format($cart->product->price) }}</div>
                        </td>
                        <td style="width: 30%">
                        <div class="product-title">Rp {{ number_format($cart->product->price * $cart->portion) }}</div>
                        </td>
                        <td style="width: 20%">
                        <form action="{{ route('cart-delete', $cart->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-remove-cart">Hapus</button>
                        </form>
                        </td>
                  </tr>
                  @php
                    $totalPrice += $cart->product->price * $cart->portion
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>

          <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
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

@push('addon-script')
    <script src="{{ asset('vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
            AOS.init();
            this.getDistrictsData();
        },

        data: {
          districts: null,
          villages: null,
          districts_id: null,
          villages_id: null

        },
        methods: {
            getDistrictsData(){
                var self = this;
                axios.get('{{ route('api-districts') }}')
                .then(function(response){
                    self.districts = response.data;
                })
            },
            getVillagesData(){
                var self = this;
                axios.get('{{ url('api/villages') }}/' + self.districts_id)
                .then(function(response){
                    self.villages = response.data;
                })

            }


        },

        // watch untuk melihat perubahan data,jika ada district data yg berubah maka akan memanggil get villages data
        watch: {
            districts_id: function(val, oldVal){
                // kosongkan dahulu, karena jika user pilih district yg berbeda pasti akan ke-reset
                this.villages_id = null;
                this.getVillagesData();
            }

        }
      });
    </script>
@endpush
