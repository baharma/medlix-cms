<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ env('APP_NAME') . ' - ' . $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('preview/iziklaim/favicon.png') }}" rel="icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/boxicons.css') }}" rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('preview/iziklaim/css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="overlay">
        <div id="text-overlay"><img src="{{ asset('preview/iziklaim/img/loading-screen-iziklaim.gif') }}"
                class="img-fluid"></div>
    </div>
    @include('preview.iziklaim.side.header')
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol>
                        <li>
                            <a href="{{ url('prev/iziklaim') }}">Home</a>
                        </li>
                        <li>{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </section>
        @yield('content')
    </main>
    <!-- End #main -->
    @include('preview.iziklaim.side.footer')
    @include('preview.iziklaim.landing.publish')
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <script src="{{ asset('preview/iziklaim/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/aos.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('preview/iziklaim/js/main.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('js')
</body>

</html>
