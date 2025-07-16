<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <p class="mb-0 phone pl-md-2">
                    <a href="tel:+1235235598" class="mr-2"><span class="fa fa-phone mr-1"></span> +1 235 2355 98</a>
                    <a href="mailto:petsetting@gmail.com"><span class="fa fa-paper-plane mr-1"></span> petsetting@gmail.com</a>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="social-media">
                    <p class="mb-0 d-flex">

                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        {{-- <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>  --}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><span class="flaticon-pawprint-1 mr-2"></span>Pet Sitting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{ request()->routeIs('user.about') ? 'active' : '' }}">
                    <a href="{{ route('user.about') }}" class="nav-link">About</a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.veterinarian') ? 'active' : '' }}">
                    <a href="{{ route('user.veterinarian') }}" class="nav-link">Veterinarian</a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.services-page') ? 'active' : '' }}">
                    <a href="{{ route('user.services-page') }}" class="nav-link">Services</a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.gallery') ? 'active' : '' }}">
                    <a href="{{ route('user.gallery') }}" class="nav-link">Gallery</a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.pricing') ? 'active' : '' }}">
                    <a href="{{ route('user.pricing') }}" class="nav-link">Pricing</a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.blog') ? 'active' : '' }}">
                    <a href="{{ route('user.blog') }}" class="nav-link">Blog</a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.contact') ? 'active' : '' }}">
                    <a href="{{ route('user.contact') }}" class="nav-link">Contact</a>
                </li>

                {{-- <li class="nav-item {{ request()->routeIs('logout') ? 'active' : '' }}">
                <a href="{{ route('logout') }}" class="nav-link">
                    <Lo></Lo>gout
                </a>
                </li> --}}

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
