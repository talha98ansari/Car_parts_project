@extends('frontend.includes.layout')
@section('content')

    <section id = "Vregistration" class = "py-3">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h2 class="">
                            User Registration
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

                    <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
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
                        <form action="{{ route('user.registration.save') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('username') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="Email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="Phone" class="form-label">Phone:</label>
                                    <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="text" class="form-control" name="password"
                                        value="">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" value="Submit" class="btn btn-submit">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
