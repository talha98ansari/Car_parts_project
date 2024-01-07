<!-- preloader starts here  -->
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <img src="{{ asset('front/images/logo.png') }}" alt="logo" class="img-fluid loader-logo">
            {{-- <div class="txt-loading">
                <span data-text-preloader="L" class="letters-loading">
                    L
                </span>
                <span data-text-preloader="O" class="letters-loading">
                    O
                </span>
                <span data-text-preloader="A" class="letters-loading">
                    A
                </span>
                <span data-text-preloader="D" class="letters-loading">
                    D
                </span>
                <span data-text-preloader="I" class="letters-loading">
                    I
                </span>
                <span data-text-preloader="N" class="letters-loading">
                    N
                </span>
                <span data-text-preloader="G" class="letters-loading">
                    G
                </span>
            </div> --}}
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
</div>
<!-- preloader ends here  -->
<?php
use App\Models\PartType;
$parttypes = PartType::get();
?>
<!-- header starts here  -->
<header>
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 pe-sm- 5 me-5 d-flex align-items-center gap-5 justify-content-center">
                            <!-- <div class="d-flex align-items-center">
                                    <img src="{{ asset('front/images/shop.png') }}" alt="" class="img-fluid">
                                    <p class="mb-0">Shop</p>
                                </div> -->
                            {{-- <div class="d-flex align-items-center">
                                <img src="{{asset('front/images/partner.png')}}" alt="" class="img-fluid">
                                <p class="mb-0">Partner</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{asset('front/images/club.png')}}" alt="" class="img-fluid">
                                <p class="mb-0">Club</p>
                            </div> --}}
                        </div>

                        <div class="flex-shrink-0">
                            @guest

                                <a href="{{ route('user.login') }}">User Sign in</a> |

                                <a href="{{ route('vendor.login') }}">Vendor Sign in</a>
                            @else
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('favourites') }}">
                                            Favourites</a></li>
                                        <li><a class="dropdown-item" href="{{ route('password.change') }}">Change
                                            Password</a></li>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="{{ route('logout') }}" class="dropdown-item"
                                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                <i class="ni ni-user-run"></i>
                                                <span>{{ __('Logout') }}</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            @endguest


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-md-flex align-items-center">
                        <div class="flex-grow-1 text-md-center">
                            <p class="text-upper-case mb-0">DRIVE AWAY WITH THE BEST DEALS! UP TO 24% OFF*</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 align-items-center">
                                <p class="p-sm text-uppercase mb-0">Don't miss . </p>
                                <p class="p-sm text-uppercase mb-0">06:40:30</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-11 ms-auto">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="{{ route('index.f') }}"><img
                                src="{{ asset('front/images/logo.png') }}" alt=""
                                class="img-fluid site-logo"></a>
                        <button class="navbar-toggler transparent-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav gap-4 ms-auto">

                                <li class="nav-item">
                                    <select name="" id="" class="header-select vehicle_type">
                                        <option value="" selected disabled>Part Type</option>

                                        @foreach ($parttypes as $m)
                                            <option
                                                {{ isset($_REQUEST['vehicle_type']) && $_REQUEST['vehicle_type'] == $m->id ? 'selected' : '' }}
                                                value="{{ $m->id }}">{{ $m->name }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="nav-item">
                                    <div class="d-flex gap-1 align-items-start"> <input type="text" id="searchbox"
                                            placeholder="Enter the part number or name" class="header-input">
                                        <div id="search-results" class="d-none"></div>
                                        <button class="site-btn header-btn searchButton2">Search</button>
                                    </div>
                                </li>

                                {{-- <li class="nav-item">
                                    <div class="d-flex gap-3 align-items-center">
                                        <a href=""><i class="fas fa-heart"></i></a>
                                        <div class="flex-shrink-0 position-relative">
                                            <a href=""><img src="{{asset('front/images/cart.png')}}" alt=""
                                class="img-fluid"></a>
                                <span class="cart-count">1</span>
                        </div>
                        <div class="">
                        </div>
                </div>
                </li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header ends here  -->

<!-- site-navigation starts here  -->
<section class="site-navigation">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <button class="navbar-toggler transparent-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav2">
                        <ul class="navbar-nav w-100 gap-4 justify-content-between">
                            <li class="nav-item dropdown dropdown-mega position-relative">
                                <a class="nav-link dropdown-toggle p-0" href="#_" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside">Services</a>
                                <?php use App\Models\Tool;
                                $tools = Tool::where('is_active', 1)->get();
                                ?>
                                <div class="dropdown-menu mega-menuu shadow">
                                    <div class="mega-content px-4">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul>
                                                                @foreach ($tools as $t)
                                                                    <li><a
                                                                            href="{{ route('service.detail', $t->id) }}">{{ $t->name }}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @foreach ($parttypes as $p)
                                <li class="nav-item">
                                    <a href="{{ url('view/part?vehicle_type=' . $p->id) }}">{{ $p->name ?? '' }}</a>
                                </li>
                            @endforeach



                        </ul>
                    </div>
                </nav>

            </div>
        </div>
    </div>
</section>
<!-- site-navigation ends here  -->
