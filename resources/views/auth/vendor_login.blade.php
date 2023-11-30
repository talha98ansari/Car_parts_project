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
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="POST" action="{{ route('vendor.login.check') }}">
                    @csrf
                    <div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Warning:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">
                                <a href="{{route('vendor.registration.type')}}" class="orange-text anchor">Don't Have An Account? Sign up Here</a>

                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="#" class="orange-text anchor">Forget Password?</a>

                            </div>
                            <div class="col-md-12">
                                <input type="submit" value="Login" class="btn btn-submit">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
