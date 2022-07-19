@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
                <h2>Pesan Tumpeng dan catering lebih mudah</h2>

                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label> Full Name </label>
                        <input id="name"
                            v-model="name"
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label> Email Address </label>
                        <input id="email"
                            v-model="email"
                            @change="checkForEmailAvailability()"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            :class="{ 'is-invalid' : this.email_unavailable}"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Password </label>
                        <input id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            required
                            autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label> Konfirmasi Password </label>
                        <input id="password-confirm"
                            type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation"
                            required
                            autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="btn btn-success btn-block mt-5"
                        :disabled="this.email_unavailable"
                    >
                        Daftar Sekarang
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                        Masuk
                    </a>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

{{-- <div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection


@push('addon-script')
    <script src="vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    {{-- for check registered email --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();

        },
        // aksi di halaman untuk cek apakah email terdaftar atau tidak. dr checkForEmailAvaibility()
        methods:{
            checkForEmailAvailability: function(){
                var self = this;
                axios.get('{{ route('api-register-check') }}',{
                    params: {
                        email: this.email
                    }
                })
                    .then(function (response) {

                        if(response.data == 'Available') {
                              self.$toasted.show(
                                "Email Anda tersedia! Silahkan lanjut langkah berikutnya", {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                              });

                              self.email_unavailable = false;

                        }else{
                              self.$toasted.error(
                              "Maaf, email sudah terdaftar pada sistem kami.", {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                              });
                              self.email_unavailable = true;
                        }




                        // handle success
                        console.log(response);
                    });
            }
        },
        data() {
            return{
                name: "Fadhilah Nur Amaliah",
                email: "fadhilah.nuramaliah@gmail.com",
                email_unavailable: false
            }
        },
      });
    </script>
@endpush
