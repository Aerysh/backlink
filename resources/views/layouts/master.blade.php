<!DOCTYPE html>
<html lang="id">
    <head>
        {{-- Meta Tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- End Meta --}}

        {{-- CSS --}}
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @yield('css')
        {{-- End CSS --}}

        <title>@yield('title')</title>
    </head>
    <body class="d-flex flex-column h-100">
        {{-- Header --}}
        <header>
            {{-- Nav --}}
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
                {{-- Container --}}
                <div class="container">
                    <a class="navbar-brand" href="#">Logo</a>
                    {{-- Collapse Button --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    {{-- End Collapse Button --}}

                    {{-- Collapse --}}
                    <div class="collapse navbar-collapse" id="navbarNav">
                        {{-- Main Nav --}}
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            {{-- Link --}}
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            {{-- End Link --}}

                            {{-- Link --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('publish.index')}}">Jual</a>
                            </li>
                            {{-- End Link --}}

                            {{-- Link --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('marketplace.index')}}">Marketplace</a>
                            </li>
                            {{-- End Link --}}

                            {{-- Link --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('info.contact')}}">Kontak Kami</a>
                            </li>
                            {{-- End Link --}}
                        </ul>
                        {{-- End Main Nav --}}

                        {{-- d-flex --}}
                        <div class="d-flex">
                            <a href="{{route('marketplace.cart')}}" class="btn btn-outline-info me-2"><i class="fa fa-shopping-cart"></i> 1</a>
                            {{-- Check if Authentication Activated --}}
                            @if (Route::has('login'))
                                {{-- Check if User Authenticated --}}
                                @auth
                                    {{-- List --}}
                                    <ul class="navbar-nav mb-2 mb-lg-0 me-2">
                                        {{-- Dropdown --}}
                                        <li class="nav-item dropdown ">
                                            {{-- Username --}}
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              {{Auth::user()->name}}
                                            </a>
                                            {{-- Username --}}

                                            {{-- List --}}
                                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                                {{-- Buyer Dashboard --}}
                                                <li><a class="dropdown-item" href="{{route('buyer.user_dashboard')}}">Beli</a></li>
                                                {{-- Buyer Dashboard --}}

                                                {{-- Seller Dashboard --}}
                                                <li><a class="dropdown-item" href="{{route('publish.user_dashboard')}}">Jual</a></li>
                                                {{-- Seller Dashboard --}}

                                                <hr>

                                                {{-- User Profile --}}
                                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                                {{-- User Profile --}}

                                                {{-- User Balance --}}
                                                <li><a class="dropdown-item" href="#">Saldo : 0</a></li>
                                                {{-- User Balance --}}

                                                {{-- Logout --}}
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                </li>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                                {{-- Logout --}}
                                            </ul>
                                            {{-- List --}}
                                        </li>
                                        {{-- Dropdown --}}
                                    </ul>
                                    {{-- List --}}
                                {{-- If User not Authenticated --}}
                                @else
                                    {{-- Login --}}
                                    <a href="{{route('login')}}" class="btn btn-outline-light me-2">Login</a>
                                    {{-- Login --}}

                                    {{-- Register --}}
                                    @if (Route::has('register'))
                                        <a href="{{route('register')}}" class="btn btn-warning">Register</a>
                                    @endif
                                    {{-- Register --}}
                                @endauth
                                {{-- End Check --}}
                            @endif
                            {{-- End Check --}}
                        </div>
                        {{-- end d-flex --}}
                    </div>
                    {{-- End Collapse --}}
                </div>
                {{-- End Container --}}
            </nav>
            {{-- End Nav --}}
        </header>
        {{-- End Header --}}

        {{-- Main --}}
        <main class="flex-shrink-0 h-auto w-100">
            {{-- Container --}}
            <div class="container-fluid px-0">
                {{-- Content --}}
                @yield('content')
                {{-- End Content --}}
            </div>
            {{-- End Container --}}
        </main>
        {{-- End Main --}}

        {{-- Footer --}}
        <footer class="text-center text-white bg-dark">
            {{-- Container --}}
            <div class="container">
                {{-- Section: Link --}}
                <section class="mt-5">
                    {{-- Row --}}
                    <div class="row text-center d-flex justify-content-center pt-5">
                        {{-- Col --}}
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white text-decoration-none">About Us</a>
                            </h6>
                        </div>
                        {{-- End Col --}}

                        {{-- Col --}}
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold ">
                                <a href="#!" class="text-white text-decoration-none">TOS</a>
                            </h6>
                        </div>
                        {{-- End Col --}}

                        {{-- Col --}}
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white text-decoration-none">Privacy</a>
                            </h6>
                        </div>
                        {{-- End Col --}}

                        {{-- Col --}}
                        <div class="col-md-2">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white text-decoration-none">Refund</a>
                            </h6>
                        </div>
                        {{-- End Col --}}
                    </div>
                    {{-- End Row --}}
                </section>
                {{-- End Section: Links --}}

                <hr class="my-5" />

                {{-- Section: Text --}}
                <section class="mb-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Praesent semper nibh eget viverra gravida.
                                Nam consectetur augue sed risus sollicitudin ultricies.
                                Mauris vulputate sem eu augue pharetra, in dictum tellus tempus.
                            </p>
                        </div>
                    </div>
                </section>
                {{-- End Section: Text --}}

                {{-- Section: Social --}}
                <section class="text-center mb-5">
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-white me-4 text-decoration-none">
                        <i class="fab fa-github"></i>
                    </a>
                </section>
                {{-- Section: Social --}}
            </div>
            {{-- End Container --}}

            {{-- Copyright --}}
            <div class="text-center p-3 bg-dark">
                © 2021
                <a class="text-white text-decoration-none" href="#">
                    Aerysh
                </a>
            </div>
            {{-- End Copyright --}}
        </footer>
        {{-- End Footer --}}

        {{-- Javascript --}}
        <script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
        @yield('js')
        {{-- End Javascript --}}

    </body>
</html>
