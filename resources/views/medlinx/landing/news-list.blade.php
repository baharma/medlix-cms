@include('preview.izidok.landing.header-page')
<style>
    .img-container {
        position: relative;
        width: 100%;
        height: 0;
        padding-top: 56.25%;
        /* 16:9 aspect ratio */
        overflow: hidden;
    }

    .img-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .text-center {
        text-align: center;
    }
</style>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="container">
            <div class="">
                <div class="flex-lg-row-fluid me-xl-15">
                    <div class="mb-17 text-center">
                        <div class="mb-8">
                            <div class="overlay mb-5 text-center">
                                <div class="" style="display: flex; justify-content: center">
                                    <img class="img-fluid rounded" src="{{ $news[0]['thumbnail'] }}" alt=""
                                        style="width: 100%">
                                </div>
                                <div class="text-center">

                                    <p href="#" class="text-dark fs-2 fw-bold mt-3"
                                        style="font-size: 20px; font-weight: bolder; text-align: center">
                                        {{ $news[0]['title'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-17">
                        <div class="row g-10">
                            @foreach ($news as $item)
                                <div class="col-md-4">
                                    <div class="card-xl-stretch">
                                        @if (isset($type) && $type == 'prev')
                                            <a
                                                href="{{ $item['check'] == null ? route('medlinx.news-detail-prev', $item['slug']) : $item['check'] }}"><img
                                                    class="img-fluid rounded w-100" src="{{ $item['thumbnail'] }}"
                                                    alt=""></a>
                                            <div class="mt-3">
                                                <a href="{{ $item['check'] == null ? route('medlinx.news-detail-prev', $item['slug']) : $item['check'] }}"
                                                    class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{ $item['title'] }}</a>

                                            </div>
                                        @else
                                            <a
                                                href="{{ $item['check'] == null ? route('medlinx.news-detail', $item['slug']) : $item['check'] }}"><img
                                                    class="img-fluid rounded w-100" src="{{ $item['thumbnail'] }}"
                                                    alt=""></a>
                                            <div class="mt-3">
                                                <a href="{{ $item['check'] == null ? route('medlinx.news-detail', $item['slug']) : $item['check'] }}"
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
            <div class="mt-5 mb-3">
                @if (isset($type) && $type == 'prev')
                    <a href="{{ route('preview', 'medlinx') }}" class="fs-6 fw-semibold link-primary">Kembali</a>
                @else
                    <a href="{{ route('medlinx.home') }}" class="fs-6 fw-semibold link-primary">Kembali</a>
                @endif
            </div>
        </div>

    </div>

</div>
