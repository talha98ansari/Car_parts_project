@extends('frontend.includes.layout')
@section('content')
<section class="banner">
    <div class="banner-carousel2">
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-inner">
                            @php
                            $words = explode(' ', $partInfo->sub_title);
                            $firstWord = array_shift($words);
                            @endphp
                            <h1 class="text-uppercase">{{$firstWord}} <span class="orange-text">
                                @if (!empty($words))
                                {{ implode(' ', $words)}}
                                @endif</span>
                            </h1>
                            <h6>{{$partInfo->content}}</h6>

                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset($partInfo->image ?? '')}}" alt="" class="img-fluid banner-img">
        </div>
    </div>
</section>
<section id="category">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                    <div class="header">
                            <h3>Featured Product</h3>
                        </div>
            </div>
            <div class="col-12 mb-3">
                <?php
                use App\Models\{PartType , Manufacturer};
                $parttypes = PartType::get();
                $manufacturer = Manufacturer::get();
                 ?>
                <div class="row">
                    <div class=" col-md-2 col-sm-12 col-xs-12 my-2 my-md-0">
                        <select class="form-select price" aria-label="Default select example">
                            <option value="" selected selected disabled >Sort By Price</option>
                            <option {{isset($_REQUEST['price']) && $_REQUEST['price'] == '100-500' ? 'selected' : '' }} value="100-500">100-500</option>
                            <option {{isset($_REQUEST['price']) && $_REQUEST['price'] == '500-800' ? 'selected' : '' }} value="500-800">500-800</option>
                            <option {{isset($_REQUEST['price']) && $_REQUEST['price'] == '800-1200' ? 'selected' : '' }} value="800-1200">800-1200</option>
                            <option {{isset($_REQUEST['price']) && $_REQUEST['price'] == '1200' ? 'selected' : '' }} value="1200+">1200-more</option>
                        </select>
                    </div>
                    <div class=" col-md-3 col-sm-12 col-xs-12 my-2 my-md-0">
                        <select class="form-select manufacturer" aria-label="Default select example">
                            <option value=""  selected disabled>Sort By Manufacturer</option>
                            @foreach ($manufacturer as $m )
                            <option {{isset($_REQUEST['manufacturer']) && $_REQUEST['manufacturer'] == $m->id ? 'selected' : '' }} value="{{$m->id}}">{{$m->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class=" col-md-2 col-sm-12 col-xs-12 my-2 my-md-0">
                        <select class="form-select statechange"  aria-label="Default select example">
                            <option value=""  selected disabled>Select State</option>
                            <option {{isset($_REQUEST['state']) && $_REQUEST['state'] == 'AbuDhabi' ? 'selected' : '' }} value="AbuDhabi">Abu Dhabi</option>
                            <option {{isset($_REQUEST['state']) && $_REQUEST['state'] == 'Dubai' ? 'selected' : '' }} value="Dubai">Dubai</option>
                            <option {{isset($_REQUEST['state']) && $_REQUEST['state'] == 'Sharjah' ? 'selected' : '' }} value="Sharjah">Sharjah</option>
                            <option {{isset($_REQUEST['state']) && $_REQUEST['state'] == 'Ajman' ? 'selected' : '' }} value="Ajman">Ajman</option>
                            <option {{isset($_REQUEST['state']) && $_REQUEST['state'] == 'UmmAl-Quwain' ? 'selected' : '' }} value="UmmAl-Quwain">Umm Al-Quwain</option>
                            <option {{isset($_REQUEST['state']) && $_REQUEST['state'] == 'Fujairah' ? 'selected' : '' }} value="Fujairah">Fujairah</option>
                        </select>
                    </div>
                    <div class=" col-md-3 col-sm-12 col-xs-12 my-2 my-md-0">
                        <select class="form-select vehicle_type" aria-label="Default select example">
                            <option value="" selected disabled>Sort By Vechicle Type</option>
                            @foreach ($parttypes as $m )
                            <option {{isset($_REQUEST['vehicle_type']) && $_REQUEST['vehicle_type'] == $m->id ? 'selected' : '' }} value="{{$m->id}}">{{$m->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" col-md-1 col-sm-12 col-xs-12 my-2 my-md-0">
                        <button class="site-btn p-sm py-2 searchButton2" id="searchButton2"><i class="fas fa-search me-3"></i>
                            Search</button>
                    </div>
                </div>
            </div>
    </div>
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-md-12">
                    <h1 class="text-center fs-2">Best <span class="orange-text">Selling</span>Parts</h1>
                </div>
                @foreach ($data as $d)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-card">
                        {{-- <div class="badge">Hot</div> --}}
                        <a href="{{route('part.detail' , $d->id)}}" style="width:100%">

                            <div class="product-tumb">
                                <img src="{{asset($d->image)}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-details">
                                <span class="product-catagory">{{$d->category->name ??''}} </span>
                                <h4><a  href="{{route('part.detail' , $d->id)}}">{{$d->name ?? ''}}</a></h4>
                                <p>{{$d->description ?? ''}}</p>
                                <div class="product-bottom-details">
                                    <div class="product-price">
                                        <p class="small">Starting From</p><small></small>{{$d->price}}
                                    </div>
                                    <div class="product-links ">
                                        <a class="hov"><span style="color: #FF4E00; font-size: 15px;">
                                            @if ($d->checkFav)
                                            <img src="{{asset('/assets/img/heartfill.png')}}" id="ic" data-ct="{{ $d->id }}"width="18"
                                            data-status = '1'></i>
                                            @else

                                                    <img id="ic" class="" src="{{asset('/assets/img/heart.png')}}" data-ct="{{ $d->id }}"
                                                    width="18" data-status = '0'></i>
                                            @endif
                                        </span></a>
                                    </div>
                                </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="badge">Hot</div>
                        <div class="product-tumb">
                            <img src="{{asset('front/images/brakes.png')}}" alt="" class="img-fluid">
        </div>
        <div class="product-details">
            <span class="product-catagory">Brakes </span>
            <h4><a href="">Brakes</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
            <div class="product-bottom-details">
                <div class="product-price">
                    <p class="small">Starting From</p><small>$230.99</small>190.00
                </div>
                <div class="product-links ">
                    <a href=""><i class="fa fa-heart"></i></a>

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="product-card">
            <div class="badge">Hot</div>
            <div class="product-tumb">
                <img src="{{asset('front/images/tyres.png')}}" alt="" class="img-fluid">
            </div>
            <div class="product-details">
                <span class="product-catagory">All Season Tyres,Tyres </span>
                <h4><a href="">Tyres</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                <div class="product-bottom-details">
                    <div class="product-price">
                        <p class="small">Starting From</p><small>$230.99</small>190.00
                    </div>
                    <div class="product-links ">
                        <a href=""><i class="fa fa-heart"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="product-card">
            <div class="badge">Sale</div>
            <div class="product-tumb">
                <img src="{{asset('front/images/engine.png')}}" alt="" class="img-fluid">
            </div>
            <div class="product-details">
                <span class="product-catagory">Engines, Engine Parts</span>
                <h4><a href="">Engines</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                <div class="product-bottom-details">
                    <div class="product-price">
                        <p class="small">Starting From</p><small>$2300.99</small>1900.00
                    </div>
                    <div class="product-links ">
                        <a href=""><i class="fa fa-heart"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="product-card">
            <div class="badge">New</div>
            <div class="product-tumb">
                <img src="{{asset('front/images/electric.png')}}" alt="" class="img-fluid">
            </div>
            <div class="product-details">
                <span class="product-catagory">Electronics, Generators/Sensors</span>
                <h4><a href="">Electronics</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                <div class="product-bottom-details">
                    <div class="product-price">
                        <p class="small">Starting From</p><small>$2300.99</small>1900.00
                    </div>
                    <div class="product-links ">
                        <a href=""><i class="fa fa-heart"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="product-card">
            <div class="badge">New</div>
            <div class="product-tumb">
                <img src="{{asset('front/images/suspention.png')}}" alt="" class="img-fluid">
            </div>
            <div class="product-details">
                <span class="product-catagory">Suspensions, Camber Kits </span>
                <h4><a href="">Suspensions</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                <div class="product-bottom-details">
                    <div class="product-price">
                        <p class="small">Starting From</p><small>$2300.99</small>1900.00
                    </div>
                    <div class="product-links ">
                        <a href=""><i class="fa fa-heart"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    </div>

    </div>
    </div>
</section>


@endsection
