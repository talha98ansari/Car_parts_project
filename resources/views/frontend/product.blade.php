@extends('frontend.includes.layout')
@section('content')
    <!-- Breadcrumb -->
    <div class="card">
        <nav style="--bs-breadcrumb-divider: '-';  background: #F4F4F4;
     border: 1px solid  #F4F4F4;"
            aria-label="breadcrumb">
            <ol class="breadcrumb  mt-3 ms-5">
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Collections</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->category->name ?? '' }}</li>

            </ol>
        </nav>

    </div>



    <!-- images tabs -->
    <div class="container-fluid">
        <div class="text-center mt-4 ">
            <span>
                <a class="btn text-white rounded-circle btn-sm1 "
                    style="background-color: white; border-radius: 60%; border: 1px solid #FF4E00;"
                    href="{{ Auth::user() && $data->creator ? 'tel:' . $data->creator->phone : '' }}" role="button"><i
                        class="fa-solid fa-phone " style="color: #FF4E00;"></i></a>
                <a class="btn text-white rounded-circle btn-sm1 mx-3 "
                    style="background-color: white; border-radius: 60%; border: 1px solid #FF4E00;" href="#!"
                    role="button"><span style="color: #FF4E00; font-size: 15px;">
                        @if ($data->checkFav)
                        <img src="{{asset('/assets/img/heartfill.png')}}" id="ic" data-ct="{{ $data->id }}"width="18"
                        data-status = '1'></i>
                        @else

                                <img id="ic" class="" src="{{asset('/assets/img/heart.png')}}" data-ct="{{ $data->id }}"
                                width="18" data-status = '0'></i>
                        @endif
                    </span></a>

            </span>

        </div>

        <div class="row">

            <div class="col-md-6  py-5 mt-5">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab"><img src="{{ asset($data->image) }}" class="img-fluid"
                                    alt="">
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-md-4 mt-2">
                <p class="color fst-italic">SKU #1161014</p>
                <h6 class="texts">{{ $data->name }}</h6>
                <div class="d-flex text-muted mt-2" id="stars">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star_alt.png') }}" alt="" class="img-fluid">
                    <div class="mx-3">reviews (3)</div>
                </div>
                <p class="mt-5"></p>
                <div class="fw-bold">PRICE</div>
                <p class="color fs-3">USD {{ $data->price }}</p>
                <p class="fw-bold mt-5">DESCRIPTION</p>
                <p class="text lead">{{ $data->description ?? '' }}</p>
                <div class="d-flex mt-4">
                    <button type="button" class="btn1 btn btn-light  text-dark mx-2">3 liters</button>
                    <button type="button" class="btn1 btn btn-light text-dark">4 liters</button>
                    <button type="button" class="btn btn-sm bg-light" style="border: none ;"> <img
                            src="{{ asset('front/ages/Group 171.png') }}" alt=""><span class="color1"> Product
                            Usage</span></button>
                </div>


                <!-- <p class="small text-muted mt-5"><img src="{{ asset('front/ages/Group 172.png') }}" width="74px" height="19px" alt="" class="img-fluid me-2">Pay in 4 interest-free payments on purchases of $30-$1,500. <span class="color1" style="text-decoration: underline; font-size: smaller;">Learn More</span></p> -->
                {{-- @guest
    <div class="gap d-flex mt-4"> <a href="{{route('user.login')}}" class="btn2 btn btn-lg text-white">Sign In To See
            Number</a>
        @else --}}
                <div class="gap d-flex mt-4"> <a href="tel:{{ $data->creator->phone ?? '' }}"
                        class="btn2 btn btn-lg text-white">Phone
                        #
                        {{ $data->creator->phone ?? '' }}</a>
                    {{-- @endguest --}}
                    <a type="button"
                        href="{{ url('https://www.google.com/maps/place/Sector+6+Surjani+Town,+Karachi,+Karachi+City,+Sindh,+Pakistan/@25.0355337,67.0522113,16z/data=!3m1!4b1!4m6!3m5!1s0x3eb343d79a415ead:0xc3da7417a41cf454!8m2!3d25.0357978!4d67.0553953!16s%2Fg%2F11f36vzj10?entry=ttu') }}"
                        class="btn3 btn btn-lg mx-3">View Location</a>
                </div>
                <h6 class="fw-bold mt-5">FOLLOW US</h6>
                <div class="d-flex">
                    <div id="social">
                        <ul>
                            <?php use App\Models\Follow;
                            $fb = Follow::where('name', 'facebook')
                                ->where('is_active', 1)
                                ->first();
                            $ins = Follow::where('name', 'instagram')
                                ->where('is_active', 1)
                                ->first();
                            $twi = Follow::where('name', 'twitter')
                                ->where('is_active', 1)
                                ->first();
                            ?>
                            <li>
                                <a href="{{ url($fb->link ?? '#') }}"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="{{ url($ins->link ?? '#') }}"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{{ url($twi->link ?? '#') }}"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
    </div>
    <!-- slider -->
    <section class="parts-catalogue pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h6 class="p-md mb-3 text-uppercase">Related Products</h6>
                </div>
                <div class="col-12">
                    <div class="owl-carousel product-carousel owl-theme">
                        @foreach ($categories as $c)
                            <div class="item">
                                <a href="{{ route('category.index', $c->id) }}" class="d-block">

                                    <div class="catalogue-card">
                                        <div class="catalogue-card-inner">
                                            <div class="catalogue-img">
                                                <img src="{{ asset($c->image) }}" alt="" class="img-fluid">
                                            </div>
                                            <div class="mt-3">
                                                <p class="p-lg mb-0">{{ $c->name ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script></script>
@endsection()
