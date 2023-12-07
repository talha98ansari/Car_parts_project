@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Contact Us</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            {{-- <li class="breadcrumb-item"><a href="{{route('partType.index')}}">Part Type</a></li>
                            --}}
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
                <form method="post" action="{{ route('store.site.contact' , $data->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="heading-small text-muted mb-4">{{ __('Contact Us Content') }}</h6>

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
                                placeholder="{{ __('para_one') }}" value="{{ old('para_one') }}" required
                                autofocus>{{$data->para_one}}</textarea>

                            @if ($errors->has('para_one'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('para_one') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                    </div>
                </form>
                <h6 class="heading-small text-muted mb-4">{{ __('Addresses') }}</h6>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('contact.create')}}" class="btn btn-sm btn-neutral">
                        New
                        <i class="ni ni-fat-add"></i>

                    </a>
                    {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th scope="col" class="sort" data-sort="name">City</th>
                                <th scope="col" class="sort" data-sort="completion">Address</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @php $i=1; @endphp
                            @foreach ($addresses as $u )

                            <tr>
                                <td class="budget">
                                    {{$i}}
                                </td>
                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{$u->city ?? ''}}</span>
                                        </div>
                                    </div>
                                </th>

                                <td>
                                    <i class="bg-primary"></i>
                                    <span class="status">{{$u->address}}</span>

                                </td>
                                <td>
                                    <i class="bg-primary"></i>
                                    <span class="status">{{$u->phone}}</span>


                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('contact.edit' , $u->id)}}">Edit</a>
                                            <a class="dropdown-item"
                                                href="{{route('contact.remove' , $u->id)}}">Delete</a>
                                            {{-- <a class="dropdown-item" href="{{route('contact.status' , $u->id)}}">Change
                                                Status</a> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php $i++ @endphp

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>

@endsection
