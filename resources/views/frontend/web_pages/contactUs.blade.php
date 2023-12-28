@extends('frontend.includes.layout')
@section('content')
    <section id="main_address">

        <div class="container contact_address p-5 my-3">
            <div class="row  align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold">
                        @php
                            $words = explode(' ', $contact_content->head_one);
                            $firstWord = array_shift($words);
                        @endphp

                        <span class="orange-bg">{{ $firstWord }}</span>
                        @if (!empty($words))
                            {{ implode(' ', $words) }}
                        @endif
                    </h1>
                    <p>{{ $contact_content->para_one }}</p>
                </div>

                <div class="col-md-6">
                    <ul class="list-unstyled">
                        @foreach ($addresses as $a)
                            <li class="d-md-flex justify-content-between my-3 align-items-center py-3">
                                <div
                                    class="wrap d-flex col-md-4 align-items-center gap-2 fw-bold justify-content-center justify-content-md-start mb-2 orange-text">
                                    <img src="./assets/images/location2.svg" class="img-fluid"
                                        alt="">{{ $a->city }}
                                </div>
                                <div class="wrap d-flex col-md-8 align-items-start gap-md-2">
                                    <img src="./assets/images/location.svg" class="img-fluid" alt="">
                                    <p class="fw-bold">{{ $a->address }}</p>
                                    <p class="fw-bold"><a href="tel:{{ $a->phone }}">{{ $a->phone }}</a></p>
                                </div>
                            </li>
                        @endforeach

                        {{-- <li
                            class="d-md-flex justify-content-between my-3 align-items-center py-3 border-top border-bottom border-white ">
                            <div class="wrap d-flex col-md-4 align-items-center gap-2 fw-bold justify-content-center justify-content-md-start mb-2 orange-text"><img
                                    src=" ./assets/images/location3.svg" class="img-fluid" alt="">Abu dhabi
                            </div>
                            <div class="wrap d-flex col-md-8 align-items-start gap-md-2 ">
                                <img src="./assets/images/location.svg" class="img-fluid" alt="">
                                <p class="fw-bold">Sheikh Zayed Road, Dubai, UAE</p>
                                <p class="fw-bold"><a href="tel:+91-000-000-000">+91-000-000-000</a></p>
                            </div>
                        </li> --}}

                </div>
            </div>
        </div>
    </section>
    <section id="form">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="container-fluid">
                        <h2 class="fs-2">Reach <span class="orange-text">Out</span> To Us <span
                                class="orange-text">!!!</span></h2>
                        <form action="" id="this_form">
                            <div>
                                <div class="row" id="contact_form">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" placeholder="Phone Number"
                                            name="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Example@example.com"
                                            name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Subject" name="subject">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="" id="" cols="30" rows="10" class="form-control" name="detail"
                                            placeholder="Details"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <span id="submitted"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="button" class="btn btn-submit" value="Submit" id="c_form">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 g-0">
                <div class="maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.9418718221364!2d55.13450567411268!3d25.06995923684503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f13435f3abe57%3A0xb4c00b9d46311cd0!2sSheikh%20Zayed%20Rd%20-%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1700488331756!5m2!1sen!2s"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Intercept the form submission
            $('#c_form').click(function(e) {
                // Prevent the default form submission
                e.preventDefault();

                // Serialize the form data
                var form = $("#this_form");
                var formData = form.serialize();
                // Make an Ajax request
                $.ajax({
                    type: 'POST', // You can use 'GET' as well
                    url: '{{ route('contact_info.save') }}', // Replace with the actual URL to handle form submission
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle the successful response here
                        if (response == 'ok') {
                            $("#submitted").html('Submitted Succesfully!');
                        }
                    },
                    error: function(error) {
                        // Handle errors here
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
