<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- TITLE -->
    <title>Auto Partz | Home</title>

    <!-- FAVICON -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/gif" sizes="32x32">

    <!-- FONTS -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"> --}}
    <link href="{{asset('front/css/fonts/inter.css')}}" rel="stylesheet">

    <!-- CSS LINKS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" /> --}}
    <link href="{{asset('front/css/owl.carousel.min.css')}}" rel="stylesheet">

    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" /> --}}
    <link href="{{asset('front/css/owl.theme.default.min.css')}}" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="{{asset('front/css/select2.min.css')}}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link href="{{asset('front/css/all.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
</head>

<body>
@include('frontend.includes.header')

@yield('content')

@include('frontend.includes.footer')
<!-- footer ends here -->

<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.bundle.min.js')}} "></script>
<script src="{{asset('front/js/all.min.js')}}"></script>
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/js/select2.min.js')}}"></script>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script src="{{asset('front/js/custom.js')}}"></script>

</body>

</html>
