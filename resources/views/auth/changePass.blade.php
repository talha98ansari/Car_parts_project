@extends('frontend.includes.layout')
@section('content')
<section id="Vlogin" class="py-3">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h2 class="">
                        Change Password
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="Vlogin_form" class="my-5">
    <div class="container">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">

                    <form role="form" method="POST" action="{{ route('password.save') }}">
                        <div>
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>

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
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <br>

                                <div class="dashboard-list">
                                    <h3 class="heading">Change Password</h3>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group name">
                                                <label>Current Password</label>
                                                <input type="password" name="current-password" class="form-control"
                                                    placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group email">
                                                <label>New Password</label>
                                                <input type="password" name="new-password" id="new-password"
                                                    class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group subject">
                                                <label>Confirm New Password</label>
                                                <input type="password" name="confirm-new-password"
                                                    id="confirm-new-password" class="form-control"
                                                    placeholder="Confirm New Password">
                                                <span id='message' style="    font-family: monospace !important;
                                                                "></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" value="Login" class="btn btn-submit" id="password"
                                    disabled>Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
