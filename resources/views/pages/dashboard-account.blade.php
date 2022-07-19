@extends('layouts.dashboard')

@section('title')
    Account Setting
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update Profile mu di sini</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    {{-- jangan lupa tambah elemen id=locations untuk sambung ke vuejs --}}
                    <form action="{{ route('dashboard-account-redirect','dashboard-account') }}" method="POST" enctype="multipart/form-data" id="locations">
                      @csrf
                        <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="{{ $user->name }}"
                                    />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{ $user->email }}"
                                    />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address_one">Alamat 1</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="address_one"
                                    name="address_one"
                                    value="{{ $user->address_one }}"
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
                                    value="{{ $user->address_two }}"
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
                                    value="{{ $user->zip_code }}"
                                    />
                                </div>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="methodKirim"
                                    >Metode Pengiriman</label
                                    >
                                    <select
                                    name="methodKirim"
                                    id="methodKirim"
                                    class="form-control"
                                    >
                                    <option value="Jemput">Ambil Sendiri</option>
                                    <option value="Delivery">
                                        Bekasi - Rp. 50.000
                                    </option>
                                    </select>
                                </div> --}}
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Nomor Hp</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="phone_number"
                                    name="phone_number"
                                    value="{{ $user->phone_number }}"
                                    />
                                </div>
                                </div>
                          </div>
                          <div class="row">
                                <div class="col text-right">
                                <button
                                    type="submit"
                                    class="btn btn-success px-5"
                                >
                                    Simpan
                                </button>
                                </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
