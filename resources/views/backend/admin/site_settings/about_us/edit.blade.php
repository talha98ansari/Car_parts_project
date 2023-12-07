@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">About Us</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            {{-- <li class="breadcrumb-item"><a href="{{route('partType.index')}}">Part Type</a></li>
                            --}}
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
                <form method="post" action="{{ route('store.site.about' , $data->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="heading-small text-muted mb-4">{{ __('About Us Content') }}</h6>

                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="pl-lg-4">

                        <div class="form-group {{ $errors->has('heading_one') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-heading_one">{{ __('Heading One') }}</label>
                            <input type="text" name="head_one" id="input-heading_one"
                                class="form-control form-control-alternative{{ $errors->has('heading_one') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('heading_one') }}" value="{{ old('heading_one',$data->head_one) }}"
                                required autofocus>

                            @if ($errors->has('heading_one'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('heading_one') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('para_one') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-para_one">{{ __('Paragrapgh Two') }}</label>
                            <textarea type="text" name="para_one" id="input-para_one"
                                class="form-control form-control-alternative{{ $errors->has('para_one') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('para_one') }}" value="{{ old('para_one') }}"
                                required autofocus>{{$data->para_one}}</textarea>

                            @if ($errors->has('para_one'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('para_one') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('heading_two') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-heading_two">{{ __('Heading Two') }}</label>
                            <input type="text" name="head_two" id="input-heading_two"
                                class="form-control form-control-alternative{{ $errors->has('heading_two') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('heading_two') }}" value="{{ old('heading_two',$data->head_two) }}"
                                required autofocus>

                            @if ($errors->has('heading_two'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('heading_two') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('para_two') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-para_two">{{ __('Paragrapgh Two') }}</label>
                            <textarea type="text" name="para_two" id="input-para_two"
                                class="form-control form-control-alternative{{ $errors->has('para_two') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('para_two') }}" value="{{ old('para_two') }}"
                                required autofocus>{{$data->para_two}}</textarea>

                            @if ($errors->has('para_two'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('para_two') }}</strong>
                            </span>
                            @endif
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
