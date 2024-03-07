<div class="py-20" id="news">
    <div class="container-fluid">
        <div class="my-17">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-0 col-md-2"></div>
                    <div class="col-8 section-title text-center pb-30">
                        <h3 class="title text-uppercase">News & Update</h3>
                    </div>
                    <div class="col-4 col-md-2 text-end my-auto">
                        <a href="{{ route('news-update') }}" class="fs-6 fw-semibold link-primary">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <div class="tns tns-default">
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                    data-tns-autoplay="true" data-tns-autoplay-timeout="5000" data-tns-controls="true"
                    data-tns-nav="true" data-tns-nav-position="bottom" data-tns-items="3" data-tns-center="false"
                    data-tns-dots="false" data-tns-prev-button="#kt_news_slider_prev1"
                    data-tns-next-button="#kt_news_slider_next1" >
                    @foreach ($news as $item)
                        <div class="card-xl-stretch mx-3 text-center font-weight-bold ">
                            @if (isset($type) && $type == 'prev')

                        <a
                        href="{{ $item['check'] == null ? route('medlinx.news-detail-prev',$item['slug']) : $item['check'] }}"><img
                            class="img-fluid rounded w-100" src="{{ $item['thumbnail'] }}" alt=""></a>
                    <div class="py-5 px-4 text-start text-md-justify rounded-bottom">
                        <a href="{{ $item['check'] == null ? route('medlinx.news-detail-prev',$item['slug']) : $item['check'] }}"
                            class="text-gray-800 fw-bold text-hover-primary text-dark lh-base">{{ $item['title'] }}</a>
                    </div>
                            @else
                            <a
                            href="{{ $item['check'] == null ? route('medlinx.news-detail',$item['slug']) : $item['check'] }}"><img
                                class="img-fluid rounded w-100" src="{{ $item['thumbnail'] }}" alt=""></a>
                        <div class="py-5 px-4 text-start text-md-justify rounded-bottom">
                            <a href="{{ $item['check'] == null ? route('medlinx.news-detail',$item['slug']) : $item['check'] }}"
                                class="text-gray-800 fw-bold text-hover-primary text-dark lh-base">{{ $item['title'] }}</a>
                        </div>

                            @endif

                        </div>
                    @endforeach
                </div>
                <button class="btn btn-icon btn-active-color-primary" id="kt_news_slider_prev1">
                    <i class="ki-duotone ki-left fs-2x"></i>
                </button>
                <button class="btn btn-icon btn-active-color-primary" id="kt_news_slider_next1">
                    <i class="ki-duotone ki-right fs-2x"></i>
                </button>
            </div>
        </div>
    </div>
</div>
