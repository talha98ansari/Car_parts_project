@extends('frontend.includes.layout')
@section('content')
<section id = "Vlogin" class = "py-3">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h2 class="">
                        {{$data->sub_title ?? ''}}
                    </h2>

                </div>
            </div>
        </div>
    </div>
</section>
<section id = "content" class = "my-5">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
               {!! $data->content ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
