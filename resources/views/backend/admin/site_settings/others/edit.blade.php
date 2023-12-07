@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">{{$data->sub_title ?? ''}}</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                             <li class="breadcrumb-item"><a href="{{route('site.other.index')}}">Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{'Others'}}</li>
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

            <div class="card-body col-md-12">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form method="post" action="{{ route('site.other.up' , $data->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="heading-small text-muted mb-4">{{$data->sub_title . ' Content' }}</h6>

                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="pl-lg-4">

                        <div class="form-group {{ $errors->has('Title') ? ' has-danger' : '' }} col-md-9">
                            <label class="form-control-label" for="input-Title">{{ __('Title') }}</label>
                            <input type="text" name="sub_title" id="input-Title"
                                class="form-control form-control-alternative{{ $errors->has('Title') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Title') }}" value="{{ old('Title',$data->sub_title) }}"
                                required autofocus>

                            @if ($errors->has('Title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('Title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('content') ? ' has-danger' : '' }} col-md-12">
                            <label class="form-control-label" for="input-content">{{ __('Paragrapgh Two') }}</label>
                            <textarea type="text" name="content" id="input-content"
                                class="form-control text-editor form-control-alternative{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('content') }}" value="{{ old('content') }}" required
                                autofocus>{{$data->content}}</textarea>

                            @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
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

    @include('layouts.footers.auth')
</div>

@endsection
