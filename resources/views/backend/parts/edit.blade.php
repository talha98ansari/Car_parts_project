@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Update Part</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('parts.index')}}">Part</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Part</li>
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
                    <form method="post" action="{{ route('parts.up' , $data->id) }}" autocomplete="off"  enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Part') }}</h6>

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
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name',$data->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('price') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-price">{{ __('Price') }}</label>
                                <input type="number" name="price" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('price') }}" value="{{ old('price',$data->price) }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('category_id') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-category_id">{{ __('Select Category') }}</label>
                                <select name="category_id" id="input-category_id" class="form-control form-control-alternative{{ $errors->has('category_id') ? ' is-invalid' : '' }}" placeholder="{{ __('category') }}"  required autofocus>
                                    @foreach ($categories as $u )
                                    <option {{$u->id==$data->category_id ? 'selected' : '' }}  value="{{$u->id}}">
                                    {{$u->name ?? ''}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group {{ $errors->has('part_type_id') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-part_type_id">{{ __('Select Part Type') }}</label>
                                <select name="part_type_id" id="input-part_type_id" class="form-control form-control-alternative{{ $errors->has('part_type_id') ? ' is-invalid' : '' }}" placeholder="{{ __('category') }}"  required autofocus>
                                    @foreach ($partType as $u )
                                    <option {{$u->id==$data->part_type_id ? 'selected' : '' }} value="{{$u->id}}">
                                    {{$u->name ?? ''}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('part_type_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('part_type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                <textarea type="" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" value="{{ old('description',$data->description) }}" required autofocus>
                                    {{ old('description',$data->description) }}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }} col-md-9">
                                <label class="form-control-label" for="input-image">{{ __('Profile picture') }}</label>
                                <input type="file" name="image" id="input-image" class="form-control form-control-alternative" placeholder="{{ __('image') }}" >

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

