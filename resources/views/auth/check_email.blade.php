@extends('frontend.includes.layout')
@section('content')
<section id="Vlogin" class="py-3">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h2 class="">
                        Forgot Password
                    </h2>

                </div>
            </div>
        </div>
    </div>
</section>
<section id="Vlogin_form" class="my-5">
    <div class="container">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center flex-column">
                <div class="col-md-6 d-flex justify-content-center align-items-center">

                    <form role="form" method="POST" action="{{ route('reset.email.check') }}">
                        @csrf
                        <div>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}

                        </div>
                        <div class="col-md-12">
                            <a type="button" href="{{('user/login')}}" class="col-12 btn btn-submit">Return To Sign
                                In</a>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Enter Your Email To Reset Password:</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="col-md-12">
                                <input type="submit" value="Send Reset Link" class="col-12 btn btn-submit">
                            </div>

                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
