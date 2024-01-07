@extends('frontend.includes.layout')
@section('content')
<style>

</style>
<section id="category">
    <div class="container">

        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-md-12">
                    <h1 class="text-center fs-2"><span class="orange-text">Favourites</span></h1>
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
                                    <div class="product-links">
                                        <a class="hov"><span >
                                            @if ($d->Fav($d->product_id))
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


    </div>

    </div>
    </div>
</section>


@endsection
