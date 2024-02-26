<div class="my-20" id="tentang-kami">
    <div class="container">
        <div class="text-center mb-17">
            <h3 class="text-primary-emphasis mb-5" id="about" data-kt-scroll-offset="{default: 100, lg: 150}">Tentang
                Kami</h3>
        </div>
        <div class="row gy-10 mb-md-20">
            <div class="col-md-6 px-5">
                <div class="text-center mb-10 mb-md-0">
                    <img src="{{ $about['image'] }}" class="img-fluid" alt="" />
                </div>
            </div>
            <div class="col-md-6 px-5">
                <div class="mb-10">
                    <h1 class="text-primary-emphasis mb-3">{{ $about['title'] }}</h1>
                    <ul class="pt-5 px-0">
                        @foreach ($about['sub_title'] as $item)
                            <li class="mb-3 fs-6">
                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.09473 10.784L0.219426 5.98977C0.0789197 5.85141 0 5.66388 0 5.46834C0 5.27281 0.0789197 5.08527 0.219426 4.94691L1.27993 3.90406C1.34955 3.83556 1.43222 3.78123 1.5232 3.74416C1.61418 3.70709 1.7117 3.68801 1.81018 3.68801C1.90866 3.68801 2.00618 3.70709 2.09716 3.74416C2.18814 3.78123 2.27081 3.83556 2.34043 3.90406L5.62466 7.13363L12.6596 0.215776C12.8003 0.0776068 12.991 0 13.1898 0C13.3887 0 13.5794 0.0776068 13.7201 0.215776L14.7806 1.25863C14.9211 1.39699 15 1.58453 15 1.78006C15 1.9756 14.9211 2.16313 14.7806 2.30149L6.15523 10.784C6.08561 10.8524 6.00295 10.9068 5.91196 10.9439C5.82098 10.9809 5.72346 11 5.62498 11C5.5265 11 5.42898 10.9809 5.338 10.9439C5.24702 10.9068 5.16436 10.8524 5.09473 10.784Z"
                                        fill="#475988" />
                                </svg>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-primary mb-3">Sertifikasi:</h4>
                    <div class="flex">
                        <img class="me-3" src="{{ asset('preview/izidok/images/logos/iso.png') }}" alt="ISO 27001">
                        <img src="{{ asset('preview/izidok/images/logos/kominfo.png') }}" alt="KOMINFO">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
