@extends('frontend.includes.layout')
@section('content')
<section id = "Vlogin" class = "py-3">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h2 class="">
Choose Registration Type
                    </h2>

                </div>
            </div>
        </div>
    </div>
</section>
<section id = "Vlogin_form" class = "my-5">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 d-flex justify-content-center align-items-center">
<a href="{{route('vendor.registration')}}">
                    <div class="col-md-12 border text-center p-4">
                            Normal Registration
                    </div>
                </a>

                </div> <div class="col-md-2 d-flex justify-content-center align-items-center">
                    <div class="col-md-12 text-center   ">
                        OR
                    </div>
                </div>
                <div class="col-md-5 d-flex justify-content-center align-items-center flex-column">
                    <a href="{{route('vendor.registration.business')}}">
                    <div class="col-md-12 border text-center p-4">
                        Business Registration
                    </div>
                </a>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
