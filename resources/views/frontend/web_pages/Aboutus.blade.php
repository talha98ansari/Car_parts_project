@extends('frontend.includes.layout')
@section('content')
<section id="vision" class="mt-5">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-about">
                        <img src="{{asset('/front/images/logo-black.png')}}" alt="" class="img-fluid">
                    </div>

                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-start flex-column">
                    <h2>{{$about_us->head_one ? strtok($about_us->head_one, " ") : ''}} <span
                            class="orange-text">{{ substr($about_us->head_one, strrpos($about_us->head_one, ' ') + 1);}}</span>
                    </h2>
                    <p>{{$about_us->para_one ?? ''}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="vision" class=" mt-3 mb-5">
    <div class="container">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 d-flex justify-content-center align-items-start flex-column">
                    <h2 class="orange-text">{{$about_us->head_two ? strtok($about_us->head_one, " ") : ''}} <span
                            class="text-dark">{{ substr($about_us->head_two, strrpos($about_us->head_one, ' ') + 1);}}</span>
                    </h2>
                    <p>{{$about_us->para_two ?? ''}}</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center">

                    <img src="{{asset('front/images/mission.svg')}}" alt="" class="img-fluid w-50">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
