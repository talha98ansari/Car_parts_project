@extends('frontend.includes.layout')
@section('content')

<section id = "Vregistration" class = "py-3">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h2 class="">
                        Vendor Registration
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
                    <form method="POST" action="{{route('vendor.registration.nb')}}">
                        @csrf
                        <input type="hidden" name="vendor_type" value="non_business">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Fname" class="form-label">First Name:</label>
                                <input type="name" class="form-control" name="first_name">
                            </div>
                            <div class="col-md-6">
                                <label for="Lname" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="col-md-6">
                                <label for="Email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="Contact" class="form-label">Personal Contact Number:</label>
                                <input type="number" class="form-control" name="phone">
                            </div>

                            <div class="col-md-12">
                                <input type="submit" value="Submit" class="btn btn-submit">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

 @endsection
