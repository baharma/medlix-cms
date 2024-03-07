<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Medlinx Asia Teknologi</title>

    <meta name="description"
        content="Medlinx Asia Teknologi Berinovasi memberikan solusi teknologi bagi industri kesehatan Indonesia">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('medlinx/landing/css/magnific-popup.css') }}">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('medlinx/landing/css/slick.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('medlinx/landing/css/LineIcons.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('medlinx/landing/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('medlinx/landing/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('medlinx/landing/css/style.css') }}">
    <link href="{{ asset('medlinx/landing/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('preview/izidok/css/plugins.bundle.css')}}">
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('medlinx.landing.navbar')

    @include('medlinx.landing.news-list')


    <div class="loading" style="display: none;">
        <p>Sedang proses pengiriman...</p>
    </div>

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== Jquery js ======-->
    <script src="{{ asset('medlinx/landing/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('medlinx/landing/js/modernizr-3.7.1.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('medlinx/landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('medlinx/landing/js/bootstrap.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('medlinx/landing/js/slick.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('medlinx/landing/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('medlinx/landing/js/ajax-contact.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ asset('medlinx/landing/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('medlinx/landing/js/isotope.pkgd.min.js') }}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('medlinx/landing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('medlinx/landing/js/scrolling-nav.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('medlinx/landing/js/main.js') }}"></script>
    <script src="{{ asset('medlinx/landing/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('medlinx/landing/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('preview/izidok/js/plugins.bundle.js') }}"></script>
    <script src="{{asset('preview/izidok/js/scripts.bundle.js')}}"></script>


</body>

</html>
