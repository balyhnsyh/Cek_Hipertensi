<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Deteksi Hipertensi</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/" class="{{ $title === 'Home' ? 'active' : '' }}">Home</a></li>
                <li>
                    @if(auth()->check())
                        <a href="/konsultasi" class="{{ $title === 'Konsultasi' ? 'active' : '' }}">Cek Hipertensi</a>
                    @else
                        <a href="{{ route('login') }}" class="{{ $title === 'Konsultasi' ? 'active' : '' }}">Cek Hipertensi</a>
                    @endif
                </li>
                <li><a href="/team" class="{{ $title === 'About Us' ? 'active' : '' }}">About Us</a></li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                            @if (Auth::user()->pfp)
                                <img class="img-profile rounded-circle ms-2"
                                    src="{{ asset('storage/' . Auth::user()->pfp) }}" alt="Profile Photo" width="28px"
                                    height="28px" style="object-fit: cover;">
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.home') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @if (auth()->user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            @if (auth()->user()->role == 'pakar')
                                <li><a class="dropdown-item" href="{{ route('penyakit') }}">
                                  Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif

                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger d-flex align-items-center" type="submit">
                                        <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                                        <p class="m-0">Logout</p>
                                    </button>
                                </form>

                            </li>
                        </ul>
                    </li>
                @else
                    <li><a class="get-a-quote" href="/login">Login</a></li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<!-- End Header -->
