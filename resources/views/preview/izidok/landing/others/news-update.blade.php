@extends('preview.izidok.landing.app')

@section('content')
    @include('preview.izidok.landing.header-page')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="container">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15">

                        <div class="mb-17 text-center">

                            <div class="mb-8 " style="text-align: center">
                                <div class="overlay mb-5">
                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
                                        <img class="img-fluid rounded" src="{{ $news[0]['images'] }}" alt="">
                                    </div>
                                </div>
                                <p href="#" class="text-dark text-justify fs-2 fw-bold " style="text-align: center">
                                    {{ $news[0]['title'] }}</p>
                            </div>
                            {{-- <div class="fs-5 fw-semibold text-gray-600 text-justify">

                                <p class="mb-8">
                                    @if ($news['0']['desc'] != null)
                                        {!! substr(extractParagraphs($news['0']['desc']), 0, 300) !!}...
                                    @endif
                                </p>
                                <p>
                                    <a>Baca
                                        selengkapnya</a>
                                </p>
                            </div> --}}
                        </div>

                        <div class="mb-17">
                            <div class="row g-10">
                                @foreach ($news as $item)
                                    <div class="col-md-4">
                                        <div class="card-xl-stretch">
                                            <a
                                                href="{{ $item['check'] == null ? url('admin/view/news/izidok/' . $item['slug']) : $item['check'] }}"><img
                                                    class="img-fluid rounded w-100" src="{{ $item['images'] }}"
                                                    alt=""></a>
                                            <div class="mt-3">
                                                <a href="{{ $item['check'] == null ? url('admin/view/news/izidok/' . $item['slug']) : $item['check'] }}"
                                                    class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{ $item['title'] }}</a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
