<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand"
          ><img src="{{ asset('images\logo.svg') }}" alt="Logo" />
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item ">
              <a href="{{ route('categories') }}" class="nav-link">Menu</a>
            </li>
            {{-- jika tamu, tampilkan yg ini --}}
            @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                </li>
                <li class="nav-item">
                    <a
                    href="{{ route('login') }}"
                    class="btn btn-success nav-link 4px text-white"
                    >Masuk</a
                    >
                </li>
            @endguest
          </ul>
          {{-- jika sudah login akan ke sini --}}
          @auth
            {{-- Desktop Menu --}}
            <ul class="navbar-nav d-none d-lg-flex mt-2">
            <li class="nav-item dropdown">
              <a
                href="#"
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
              >
                Hi, {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu">
                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                <a href="{{ route('dashboard-account') }}" class="dropdown-item"
                  >Settings</a
                >
                <div class="dropdown-divider">
                </div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
              </div>
            </li>
            <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                <img src="images/icon-cart-empty.svg" alt="" />
              </a>
            </li>
          </ul>
            {{-- Mobile menu --}}
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block"> cart </a>
            </li>
          </ul>
          @endauth
        </div>
      </div>
    </nav>
