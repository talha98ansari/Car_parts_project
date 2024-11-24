@extends('frontend.includes.layout')
@section('content')
    <style>

    </style>
    <section id="category">
        <div class="container">

            <div class="container-fluid">
                <div class="row py-5">
                    <div class="col-md-12">
                        <h1 class="text-center fs-2"><span class="orange-text">Cart</span></h1>
                    </div>
                    @forelse ($data as $d)
                        <div class="col-lg-4 col-md-6 col-sm-12 parent-container-class">
                            <div class="product-card" style="position: relative;">
                                <!-- Top-right corner icon -->
                                <img id="remove_cart_page" class="remove_cart_page"
                                src="{{ asset('/assets/img/minus-button.png') }}"
                                data-ct="{{ $d->id }}"
                                width="54"
                                data-status="1"
                                style="
                                    position: absolute;
                                    top: -12px;
                                    right: -12px;
                                    z-index: 10;
                                    cursor: pointer;
                                    filter: drop-shadow(0px 2px 2px black);">


                                <!-- Product details -->
                                <a href="{{ route('part.detail', $d->id) }}" style="width:100%">
                                    <div class="product-tumb">
                                        <img src="{{ asset($d->image) }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="product-details">
                                        <span class="product-catagory">{{ $d->category->name ?? '' }} </span>
                                        <h4><a href="{{ route('part.detail', $d->id) }}">{{ $d->name ?? '' }}</a></h4>
                                        <p>{{ $d->description ?? '' }}</p>
                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <p class="small">Starting From</p><small></small>{{ $d->price }}
                                            </div>
                                            <div class="product-links">
                                                <a class="hov"><span>
                                                        @if ($d->Fav($d->product_id))
                                                            <img src="{{ asset('/assets/img/heartfill.png') }}"
                                                                id="ic" data-ct="{{ $d->id }}" width="18"
                                                                data-status='1'>
                                                        @else
                                                            <img id="ic" class=""
                                                                src="{{ asset('/assets/img/heart.png') }}"
                                                                data-ct="{{ $d->id }}" width="18"
                                                                data-status='0'>
                                                        @endif
                                                    </span></a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="product-card" style="position: relative;">
                                <h4 class="text-center fs-3" style="position: absolute; top: 10px; right: 10px;">Nothing
                                    Here ..!</h4>
                            </div>
                        </div>
                    @endforelse
                    <a type="button" target="_blank"
                    class="btn3 btn btn-lg mx-3 mb-2 "><span class="cart-amount">{{ $totalPrice }}</span></a>
                <a type="button" target="_blank" href="{{ url('checkout') }}"
                    class="btn3 btn btn-lg mx-3">checkout</a>

                </div>
            </div>
        </div>
    </section>
@endsection
<style>
    .parent-container-class {
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.parent-container-class.fade-out {
    transform: scale(0.9);
    opacity: 0;
}
</style>
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script>
$(document).on("click", ".remove_cart_page", function () {
    let $this = $(this); // The clicked element
    let st = $this.attr('data-status');
    let ct = $this.attr('data-ct');

    if (st == 1) {
        // Make the AJAX request
        $.ajax({
            type: 'GET',
            url: '/rem-to-cart/' + ct,
            success: function (data) {
                if (!data['status']) {
                    location.href = '/user/login';
                } else {
                    // Update cart count
                    $('.cart-count').text(data['count']);
                    $('.cart-amount').text(data['total_price']);

                    // Add fade-out animation and remove element
                    $this.closest('.parent-container-class')
                        .addClass('fade-out')
                        .delay(300)
                        .queue(function () {
                            $(this).remove();
                        });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
});

    </script>
