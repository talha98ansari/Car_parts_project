@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Add new slider</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('slider.index')}}">slider</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New slider</li>
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
                <form method="post" action="{{ route('slider.up' , $data->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="heading-small text-muted mb-4">{{ __('slider') }}</h6>

                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="pl-lg-4">

                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-title">{{ __('title') }}</label>
                            <input type="text" name="title" id="input-title"
                                class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('title') }}" value="{{ old('title', $data->title) }}" required autofocus>

                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('heading') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-heading">{{ __('Heading') }}</label>
                            <input type="text" name="heading" id="input-heading" value="{{$data->heading}}"
                                class="form-control form-control-alternative" placeholder="{{ __('heading') }}">

                            @if ($errors->has('heading'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('heading') }}</strong>
                            </span>
                            @endif
                        </div>   <div class="form-group {{ $errors->has('sub_heading') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-sub_heading">{{ __('Sub Heading') }}</label>
                            <input type="text" name="sub_heading" id="input-sub_heading" value="{{$data->sub_heading}}"
                                class="form-control form-control-alternative" placeholder="{{ __('sub_heading') }}">

                            @if ($errors->has('sub_heading'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sub_heading') }}</strong>
                            </span>
                            @endif
                        </div>   <div class="form-group {{ $errors->has('content') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-content">{{ __('Content') }}</label>
                            <textarea type="text" name="content" id="input-content" value="{{$data->content}}"
                                class="form-control form-control-alternative" placeholder="{{ __('content') }}">{{$data->content}}</textarea>

                            @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-image">{{ __('picture') }}</label>
                            <input type="file" name="image" id="input-image"
                                class="form-control form-control-alternative" placeholder="{{ __('image') }}">

                            @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
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
