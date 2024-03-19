@extends('preview.iziklaim.landing-side')

@section('content')
    <style>
        .image {
            text-align: center !important;
            margin-bottom: 50px;
        }

        img {
            max-width: 750px;
        }

        .text-justify {
            text-align: justify;
        }
    </style>
    <div id="kt_app_content mb-5 mt-5" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="container">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15">
                        <div class="mb-10">
                            <div class="mb-5 mt-5">
                                <h3 href="#" class="text-dark text-center fw-bold">{{ $news_title }}</h3>
                            </div>
                            <div class="mt-5 text-justify">
                                {!! $news_details !!}
                            </div>
                        </div>
                        <br>
                        <a href="{{ url('admin/view/news/iziklaim') }}"
                            class="fs-6 fw-semibold link-primary mb-5">Kembali</a>
                        <br> <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
