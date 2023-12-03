@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Add new Manufacturer</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('manufacturer.index')}}">manufacturer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Manufacturer</li>
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
                <form method="post" action="{{ route('manufacturer.store') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="heading-small text-muted mb-4">{{ __('Manufacturer') }}</h6>

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
                            <input type="text" name="name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        {{-- <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-image">{{ __('Profile picture') }}</label>
                            <input type="file" name="image" id="input-image"
                                class="form-control form-control-alternative" placeholder="{{ __('image') }}">

                            @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div> --}}
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
