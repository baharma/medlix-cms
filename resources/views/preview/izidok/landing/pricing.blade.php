<div class="mt-sm-n20">
    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                fill="currentColor"></path>
        </svg>
    </div>
    <div class="py-20 landing-dark-bg">
        <div class="container position-relative">
            <div class="d-flex flex-column container pt-lg-20">
                <div class="mb-13 text-center">
                    <h1 class="text-white fw-bold mb-10" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">
                        Harga</h1>
                </div>
                <div class="text-center" id="kt_pricing">
                    <div class="row g-10">
                        @foreach ($price as $item)
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    @if ($item['best_seller'] == 1)
                                        <div class="d-flex h-100 align-items-start">
                                            <img class="img-fluid recommend"
                                                src="{{ asset('preview/izidok/images/ilustrations/best-seller.png') }}"
                                                alt="Best Seller">
                                        </div>
                                    @endif
                                    <div
                                        class="w-100 d-flex flex-column flex-center @if ($item['best_seller']) bg-primary @endif rounded-3 bg-body py-15 px-10">
                                        <div class="mb-7 text-center">
                                            <h1
                                                class=" mb-2 fw-boldest {{ $item['best_seller'] == 1 ? 'text-white' : 'text-dark' }}">
                                                {{ $item['name'] }}</h1>
                                            <h3
                                                class=" mb-5 fw-boldest {{ $item['best_seller'] == 1 ? 'text-white' : 'text-dark' }}">
                                                Masa Berlaku {{ $item['duration'] }} Bulan</h3>
                                            <div class="text-center">
                                                <span class="mb-2 text-primary">Rp</span>
                                                <span
                                                    class="fs-3x fw-bold {{ $item['best_seller'] == 1 ? 'text-white' : 'text-primary' }}">{{ $item['amount'][0] }}</span>
                                                <span
                                                    class="fs-2x fw-semibold {{ $item['best_seller'] == 1 ? 'text-white' : 'text-primary' }}">{{ $item['amount'][1] }}</span>
                                            </div>
                                        </div>
                                        <div class="w-100 mb-10">
                                            @php
                                                $count = 5;
                                            @endphp
                                            @for ($i = 0; $i < $count; $i++)
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-start  pe-3 {{ $item['best_seller'] == 1 ? 'text-white' : 'text-gray-800' }}">
                                                        {{ $item['details'][$i] }}
                                                    </span>
                                                    <i
                                                        class="ki-duotone ki-check-circle fs-1 {{ $item['best_seller'] == 1 ? 'text-primary' : 'text-white ' }}">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            @endfor
                                            <div class="hide-price-{{ $item['id'] }}" style="display: none;">
                                                @php
                                                    $start = 5;
                                                    $total = count($item['details']);
                                                @endphp
                                                @for ($a = $start; $a < $total; $a++)
                                                    <div class="d-flex flex-stack mb-5">
                                                        <span
                                                            class="fw-semibold fs-6 text-start {{ $item['best_seller'] == 1 ? 'text-white' : 'text-gray-800' }}">
                                                            {{ $item['details'][$a] }}
                                                        </span>
                                                        <i
                                                            class="ki-duotone ki-check-circle fs-1 {{ $item['best_seller'] == 1 ? 'text-primary' : 'text-white ' }}">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <button
                                            class="btn  show-more-{{ $item['id'] }} {{ $item['best_seller'] == 1 ? 'btn-light text-primary' : 'btn-primary' }}"
                                            data-type="hide">Lihat Selengkapnya</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="row mt-15">
                        <div class="col">
                            <div class="text-start text-sm-end text-white">* Penawaran khusus bisa menghubungi Tim
                                Sales & Marketing izidok</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                fill="currentColor"></path>
        </svg>
    </div>
</div>

@push('script')
    <script>
        $('.show-more-1').on('click', function() {
            if ($(this).data('type') === 'hide') {
                $(this).html('Lihat Lebih Sedikit')
                $('.hide-price-1').slideDown()
                $(this).data('type', 'show');
                $(this).attr('data-type', 'show');
            } else {

                $('.hide-price-1').slideUp()
                $(this).html('Lihat Selengkapnya')
                $(this).data('type', 'hide');
                $(this).attr('data-type', 'hide');
            }
        })
        $('.show-more-2').on('click', function() {
            if ($(this).data('type') === 'hide') {
                $(this).html('Lihat Lebih Sedikit')
                $('.hide-price-2').slideDown()
                $(this).data('type', 'show');
                $(this).attr('data-type', 'show');
            } else {

                $('.hide-price-2').slideUp()
                $(this).html('Lihat Selengkapnya')
                $(this).data('type', 'hide');
                $(this).attr('data-type', 'hide');
            }
        })
        $('.show-more-3').on('click', function() {
            if ($(this).data('type') === 'hide') {
                $(this).html('Lihat Lebih Sedikit')
                $('.hide-price-3').slideDown()
                $(this).data('type', 'show');
                $(this).attr('data-type', 'show');
            } else {

                $('.hide-price-3').slideUp()
                $(this).html('Lihat Selengkapnya')
                $(this).data('type', 'hide');
                $(this).attr('data-type', 'hide');
            }
        })
    </script>
@endpush
