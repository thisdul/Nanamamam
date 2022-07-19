@extends('layouts.app')

@section('title')
    Nanamamam Homepage
@endsection

@section('content')
     <div class="page-content page-home">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div
                id="carouselStore"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#carouselStore"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li data-target="#carouselStore" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel1"
                    />
                  </div>
                  <div class="carousel-item">
                    <img src="images/banner.jpg"" class="d-block w-100"
                    alt="Carousel2" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="store-categories mt-5">
        <div class="container">
            {{-- looping dengan for else, dicek apakah datanya ada atau tidak. kalo ada muuncul diatas, kalo gak dibawahnya --}}
          <div class="row mb-3">
            <div class="col-12" data-aos="fade-up">
              <h3>Kategori Menu</h5>
            </div>
          </div>
          <div class="row">
            @php
                $incrementCategory=0
            @endphp
            @forelse ( $categories as $category )
                <div
                    class="col-6 col-md-3 col-lg-2"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementCategory+=100 }}"
                >
                    <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                            <p class="categories-text">{{ $category->name }}</p>
                        </div>
                    </a>
                </div>

            @empty
                <div class="col-12 text-center py-5"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    No Categories Found
                </div>
            @endforelse
          </div>
        </div>
      </section>

      <section class="store-trend-products mt-5">
        <div class="container">
          <div class="row mb-3">
            <div class="col-12" data-aos="fade-up">
              <h3>Menu Andalan</h3>
            </div>
          </div>
          <!-- Data aos ini berfungsi untuk animasi fade up, lalu delay ini akan menampilkan item berurutan.  -->
          <div class="row">
            @php
                $incrementProduct=0
            @endphp
            @forelse ( $products as $product )
                <div
                    class="col-6 col-md-4 col-lg-3"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementProduct+=100 }}"
                >
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                        <div
                            class="products-image"
                            style="
                                @if($product->galleries->count())
                                    background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                @else
                                    background-color: #eee
                                @endif
                                "
                        ></div>
                        </div>
                        <div class="products-text">{{ $product->name }}</div>
                        <div class="products-price">Rp {{ number_format($product->price)}}</div>
                    </a>
                </div>

            @empty
                 <div class="col-12 text-center py-5"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    No Products Found
                </div>

            @endforelse
          </div>
        </div>
      </section>
    </div>


@endsection
