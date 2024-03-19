@extends('preview.izidok.landing.app')
@push('style')
    <style>
        .image {
            text-align: center;
        }

        img {
            max-width: 750px;
        }
    </style>
@endpush
@section('content')
    @include('preview.izidok.landing.header-page')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="container">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15">
                        <div class="mb-10">
                            <div class="mb-8">
                                <h1 href="#" class="text-dark text-center fw-bold">{{ $news_title }}</h1>
                            </div>
                            <div class="fs-5 text-justify">
                                {!! $news_details !!}
                            </div>
                        </div>
                        <a href="{{ url('admin/view/news/izidok') }}" class="fs-6 fw-semibold link-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
