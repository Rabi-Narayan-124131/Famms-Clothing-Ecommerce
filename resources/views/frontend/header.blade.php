<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="250"
                    src="{{ asset('frontend/assets/images/logo.png') }}" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/product') }}">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        @auth
                        <a class="nav-link" href="{{ url('/show_cart') }}" style="color: #c78c1f"><i
                                class="fa-solid fa-cart-shopping"></i>Cart[{{ $count }}]</a>
                        @endauth

                        @guest
                        <a class="nav-link" href="{{ url('/show_cart') }}" style="color: #c78c1f"><i
                                class="fa-solid fa-cart-shopping"></i>[0]</a>
                        @endguest
                    </li>
                    <li class="nav-item">
                        @auth
                        <a class="nav-link" href="{{ url('/show_order') }}"
                            style="color: #39c217">Order[{{ $ocount }}]</a>
                        @endauth

                        @guest
                        <a class="nav-link" href="{{ url('/show_order') }}" style="color: #39c217">Order[0]</a>
                        @endguest
                    </li>

                    @if (Route::has('login'))

                    @auth

                    <li class="nav-item">
                        <x-app-layout>

                        </x-app-layout>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('login') }}" id="login-css">Login</a>
                    </li>

                    @if (Route::has('register'))

                    <li class="nav-item" style="padding-left: 10px !important;">
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
