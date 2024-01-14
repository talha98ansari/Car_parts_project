@extends('frontend.includes.layout')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

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
                            <img src="{{ asset('/assets/img/heartfill.png') }}" id="ic"
                                data-ct="{{ $data->id }}"width="18" data-status = '1'></i>
                        @else
                            <img id="ic" class="" src="{{ asset('/assets/img/heart.png') }}"
                                data-ct="{{ $data->id }}" width="18" data-status = '0'></i>
                        @endif
                    </span></a>

            </span>

        </div>

        <div class="row">

            <div class="col-md-7  py-5 mt-5">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{-- <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab"><img src="{{ asset($data->image) }}" class="img-fluid"
                                    alt="">
                            </div>
                        </div> --}}

                        {{-- product slider script is added at the bottom of this view --}}
                        <div id="slider_product">
                            <section class="banner-section container">
                                <div class="container">
                                    <div class="vehicle-detail-banner banner-content clearfix">
                                        <div class="banner-slider">
                                            <div class="slider slider-for">
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                        alt="Car-Image">
                                                </div>
                                                <div class="slider-banner-image">
                                                    <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                                        alt="Car-Image">
                                                </div>
                                            </div>
                                            <div class="slider slider-nav thumb-image">
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine1</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine2</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine3</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine1</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine2</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine3</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine1</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine2</span>
                                                </div>
                                                <div class="thumbnail-image">
                                                    <div class="thumbImg">
                                                        <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                                            alt="slider-img">
                                                    </div>
                                                    <span>White Pearl Crystal Shine3</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-md-5 mt-2">
                {{-- <p class="color fst-italic">SKU #1161014</p> --}}
                <h6 class="texts">{{ $data->name }}</h6>
                <div class="d-flex text-muted mt-2" id="stars">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star.png') }}" alt="" class="img-fluid">
                    <img src="{{ asset('front/images/star_alt.png') }}" alt="" class="img-fluid">
                    <div class="mx-3">reviews (3)</div>
                    <div class="mx-1">
                        <a type="button" class="" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <small> Rate this Product</small>
                    </a>
                    </div>
                </div>
                <p class="mt-5"></p>
                <div class="fw-bold">PRICE</div>
                <p class="color fs-3">USD {{ $data->price }}</p>
                <p class="fw-bold mt-5">DESCRIPTION</p>
                <p class="text lead">{{ $data->description ?? '' }}</p>
                {{-- <div class="d-flex mt-4">
                    <button type="button" class="btn1 btn btn-light  text-dark mx-2">3 liters</button>
                    <button type="button" class="btn1 btn btn-light text-dark">4 liters</button>
                    <button type="button" class="btn btn-sm bg-light" style="border: none ;"> <img
                            src="{{ asset('front/ages/Group 171.png') }}" alt=""><span class="color1"> Product
                            Usage</span></button>
                </div> --}}


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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review And rating</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="master">

                          <h6>How was your experience about our product?</h6>

                          <div class="rating-component">
                            <div class="status-msg">
                              <label>
                                              <input  class="rating_msg" type="hidden" name="rating_msg" value=""/>
                                          </label>
                            </div>
                            <div class="stars-box">
                              <i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
                              <i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
                              <i class="star fa fa-star" title="3 stars" data-message="Average quality" data-value="3"></i>
                              <i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
                              <i class="star fa fa-star" title="5 stars" data-message="very good qality" data-value="5"></i>
                            </div>
                            <div class="starrate">
                              <label>
                                              <input  class="ratevalue" type="hidden" name="rate_value" value=""/>
                                          </label>
                            </div>
                          </div>

                          <div class="feedback-tags">
                            <div class="tags-container" data-tag-set="1">
                              <div class="question-tag">
                                Why was your experience so bad?
                              </div>
                            </div>
                            <div class="tags-container" data-tag-set="2">
                              <div class="question-tag">
                                Why was your experience so bad?
                              </div>

                            </div>

                            <div class="tags-container" data-tag-set="3">
                              <div class="question-tag">
                                Why was your average rating experience ?
                              </div>
                            </div>
                            <div class="tags-container" data-tag-set="4">
                              <div class="question-tag">
                                Why was your experience good?
                              </div>
                            </div>

                            <div class="tags-container" data-tag-set="5">
                              <div class="make-compliment">
                                <div class="compliment-container">
                                  Give a compliment
                                  <i class="far fa-smile-wink"></i>
                                </div>
                              </div>
                            </div>

                            <div class="tags-box">
                              <input type="text" class="tag form-control" name="comment" id="inlineFormInputName" placeholder="please enter your review">
                              <input type="hidden" name="product_id" value="{{ $data->id }}" />
                            </div>

                          </div>

                          <div class="button-box">
                            <input type="submit" class=" done btn btn-warning" disabled="disabled" value="Add review" />
                          </div>

                          <div class="submited-box">
                            <div class="loader"></div>
                            <div class="success-message">
                              Thank you!
                            </div>
                          </div>
                        </div>

                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <style>




    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            vertical: true,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            verticalSwiping: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        vertical: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        vertical: false,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        vertical: false,
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        vertical: false,
                        slidesToShow: 2,
                    }
                }
            ]
        });
        $(".rating-component .star").on("mouseover", function () {
    var onStar = parseInt($(this).data("value"), 10);
    $(this).parent().children("i.star").each(function (e) {
        $(this).toggleClass("hover", e < onStar);
    });
}).on("mouseout", function () {
    $(this).parent().children("i.star").removeClass("hover");
});

$(".rating-component .stars-box .star").on("click", function () {
    var onStar = parseInt($(this).data("value"), 10);
    var stars = $(this).parent().children("i.star");
    var ratingMessage = $(this).data("message");

    var msg = onStar.toString();
    $(".rating-component .starrate .ratevalue").val(msg);

    $(".fa-smile-wink").show();
    $(".button-box .done").show();

    $(".button-box .done").prop("disabled", onStar !== 5);

    stars.removeClass("selected");

    for (var i = 0; i < onStar; i++) {
        $(stars[i]).addClass("selected");
    }

    $(".status-msg .rating_msg").val(ratingMessage);
    $(".status-msg").html(ratingMessage);
    $("[data-tag-set]").hide();
    $("[data-tag-set=" + onStar + "]").show();
});

$(".feedback-tags").on("click", function () {
    var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
    choosedTagsLength = choosedTagsLength + 1;

    if ($(this).hasClass("choosed")) {
        $(this).removeClass("choosed");
        choosedTagsLength = choosedTagsLength - 2;
    } else {
        $(this).addClass("choosed");
        $(".button-box .done").removeAttr("disabled");
    }

    console.log(choosedTagsLength);

    if (choosedTagsLength <= 0) {
        $(".button-box .done").prop("disabled", true);
    }
});

$(".compliment-container .fa-smile-wink").on("click", function () {
    $(this).fadeOut("slow", function () {
        $(".list-of-compliment").fadeIn();
    });
});

$(".done").on("click", function () {
    $(".rating-component, .feedback-tags, .button-box").hide();
    $(".submited-box").show();
    $(".submited-box .loader").show();

    setTimeout(function () {
        $(".submited-box .loader").hide();
        $(".submited-box .success-message").show();
    }, 1500);
});
    </script>
@endsection()
