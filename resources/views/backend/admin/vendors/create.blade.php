@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Add New Vendor</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('vendors.index')}}">vendors</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add new Vendor</li>
              </ol>
            </nav>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--7">

        <div class="col-md-9 order-xl-1">
            <div class="card bg-secondary shadow">

                <div class="card-body">
                    <form method="post" action="{{ route('vendors.store') }}" autocomplete="off"  enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Add new vendor') }}</h6>

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="pl-lg-4">

                            <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('first_name') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-first_name">{{ __('first_Name') }}</label>
                                <input type="text" name="first_name" id="input-first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('first_Name') }}" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>  <div class="form-group {{ $errors->has('last_name') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-last_name">{{ __('last_name') }}</label>
                                <input type="text" name="last_name" id="input-last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('last_name') }}" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-phone">{{ __('phone') }}</label>
                                <input type="number" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('address') }}" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                <input type="text" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('password') }}" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('profile_picture') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-profile_picture">{{ __('Profile picture') }}</label>
                                <input type="file" name="profile_picture" id="input-profile_picture" class="form-control form-control-alternative" placeholder="{{ __('profile_picture') }}"  required>

                                @if ($errors->has('profile_picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profile_picture') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('vendor_type') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-vendor_type">{{ __('Select Category') }}</label>
                                <select name="vendor_type" id="input-vendor_type" class="vendor_type form-control form-control-alternative{{ $errors->has('vendor_type') ? ' is-invalid' : '' }}" placeholder="{{ __('category') }}"  required autofocus>
                                    <option value="non_business">Non Business</option>
                                    <option value="business">Business</option>
                                </select>
                                @if ($errors->has('vendor_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vendor_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="d-none business_container">
                            <div class="form-group {{ $errors->has('b_name') ? ' has-danger' : '' }} col-md-9">
                                <label for="Business" class="form-label">Business Name:</label>
                                <input type="text" class="form-control form-control-alternative" name="b_name">
                            </div>
                            <div class="form-group {{ $errors->has('niche') ? ' has-danger' : '' }} col-md-9">
                                <label for="Niche" class="form-label">Business Niche:</label>
                                <input type="text" class="form-control form-control-alternative" name="niche">
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }} col-md-9">
                                <label for="BusinessC" class="form-label">Business Contact Number:</label>
                                <input type="number" class="form-control form-control-alternative" name="b_phone">
                            </div>
                            <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }} col-md-9">
                                <label for="Businessaddress" class="form-label">Business Address:</label>
                                <input type="text" class="form-control form-control-alternative" name="b_address">
                            </div>
                        </div>
                        </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
