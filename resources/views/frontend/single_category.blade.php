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
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-md-12">
                    <h1 class="text-center fs-2">Best <span class="orange-text">Selling</span>Parts</h1>
                </div>
                @foreach ($data as $d)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-card">
                        {{-- <div class="badge">Hot</div> --}}
                        <a href="{{route('parts' , $d->id)}}" style="width:100%">

                            <div class="product-tumb">
                                <img src="{{asset($d->image)}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-details">
                                <span class="product-catagory">{{$d->category->name ??''}} </span>
                                <h4><a  href="{{route('parts' , $d->id)}}">{{$d->name ?? ''}}</a></h4>
                                <p>{{$d->description ?? ''}}</p>
                                <div class="product-bottom-details">
                                    <div class="product-price">
                                        <span class="text-muted small">Starting From  </span>
                                        <span style="float:right">   {{$d->getshortprice($d->id) ?? '-'}}
                                        </span>
                                    </div>
                                    {{-- <div class="product-links ">
                                        <a href=""><i class="fa fa-heart"></i></a>

                                    </div> --}}
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
