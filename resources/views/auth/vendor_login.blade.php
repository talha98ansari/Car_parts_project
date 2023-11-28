@extends('frontend.includes.layout')
@section('content')
<section id = "Vlogin" class = "py-3">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h2 class="">
                        Vendor Login
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
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{asset('front/images/vendorLogin.svg')}}" alt="" class="img-fluid w-75">
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">
                                <a href="{{route('vendor.registration')}}" class="orange-text anchor">Don't Have An Account? Sign up Here</a>

                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="#" class="orange-text anchor">Forget Password?</a>

                            </div>
                            <div class="col-md-12">
                                <input type="button" value="Login" class="btn btn-submit">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
