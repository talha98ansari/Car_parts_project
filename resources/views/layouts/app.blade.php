<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Auto Partz Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/summernote-lite.min.css" rel="stylesheet">

</head>

<body class="{{ $class ?? '' }}">
    @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @include('layouts.navbars.sidebar')
    @endauth

    <div class="main-content">
        @include('layouts.navbars.navbar')
        @yield('content')
    </div>

    @guest()
    @include('layouts.footers.guest')
    @endguest
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<style>
/* #DataTables_Table_0_length{
    display: none;
} */
table.dataTable.no-footer {
    /* border-bottom: 1px solid #111; */
    border:none !important;
}

</style>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

    <script src="https://nightly.datatables.net/js/dataTables.bootstrap4.min.js "></script>
    <script>
          $(document).ready(function() {
        // Select all tables and apply DataTable

        $('table').DataTable({
        responsive: true,
        searching: false,
        language: {
    paginate: {
        next: '<i class="fas fa-angle-right"></i>', // or '→'
      previous: '<i class="fas fa-angle-left"></i>' // or '←'
    }
  }
        // other DataTable options...

    });
    });

        const images = document.querySelectorAll('img');

        images.forEach(img => {
          img.addEventListener('error', function handleError() {
            const defaultImage ="{{asset('black.png')}}";
            img.src = defaultImage;
            img.alt = 'default';
          });
        });

        $(document).ready(function() {
        // $('#job_description').summernote();

        const text = document.querySelectorAll('textarea');

        $('.text-editor').summernote({
            placeholder: '',
            tabsize: 90,
            height: 280,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            // ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

    </script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')

    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    <script src="{{ asset('argon') }}/js/summernote-lite.min.js"></script>



</body>

</html>
