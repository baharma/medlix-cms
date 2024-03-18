@php

// function extractParagraphs($data)
// {
//     // Check if <figure> element exists in data
//         if (strpos($data, '<figure') === false) {
//         return $data; // Return early if no <figure> element found
//     }

//     // Remove <figure> elements
//     $dataWithoutFigure = preg_replace('/<figure[^>]>.?<\/figure>/s', '', $data);

//     // Extract content inside <p> tags
//     preg_match_all('/<p>(.*?)<\/p>/', $dataWithoutFigure, $matches);

//     // Return the extracted content as an array
//     return $matches[1];
// }

    @endphp
    @include('preview.izidok.landing.header-page')

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="container">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15">

                        <div class="mb-17 text-center">

                            <div class="mb-8">
                                <div class="overlay mb-5">
                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
                                        <img class="img-fluid rounded" src="{{ $news[0]['thumbnail'] }}" alt="">
                                    </div>
                                </div>
                                <p href="#" class="text-dark text-justify fs-2 fw-bold">{{ $news[0]['title'] }}</p>
                            </div>
                            <div class="fs-5 fw-semibold text-gray-600 text-justify">

                                {{-- <p class="mb-8">

                                    {!! substr(extractParagraphs($news['0']['description']), 0, 300) !!}...
                                </p> --}}
                                <p>
                                    <a >Baca
                                        selengkapnya</a>
                                </p>
                            </div>
                        </div>

                        <div class="mb-17">
                            <div class="row g-10">
                                @foreach ($news as $item)
                                    <div class="col-md-4">
                                        <div class="card-xl-stretch">
                                            @if (isset($type) && $type == 'prev')
                                            <a
                                                href="{{ $item['check'] == null ? route('medlinx.news-detail-prev',$item['slug']) : $item['check'] }}"><img
                                                    class="img-fluid rounded w-100" src="{{ $item['thumbnail'] }}"
                                                    alt=""></a>
                                            <div class="mt-3">
                                                <a href="{{ $item['check'] == null ? route('medlinx.news-detail-prev',$item['slug']) : $item['check'] }}"
                                                    class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{ $item['title'] }}</a>

                                            </div>
                                            @else
                                            <a
                                                href="{{ $item['check'] == null ? route('medlinx.news-detail',$item['slug']) : $item['check'] }}"><img
                                                    class="img-fluid rounded w-100" src="{{ $item['thumbnail'] }}"
                                                    alt=""></a>
                                            <div class="mt-3">
                                                <a href="{{ $item['check'] == null ? route('medlinx.news-detail',$item['slug']) : $item['check'] }}"
                                                    class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{ $item['title'] }}</a>

                                            </div>
                                            @endif



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
