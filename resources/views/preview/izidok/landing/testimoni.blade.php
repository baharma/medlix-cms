<div class="py-20 my-5 position-relative testimoni">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mb-17">
                <h3 class="text-primary mb-5" id="testimoni" data-kt-scroll-offset="{default: 125, lg: 150}">Testimoni</h3>
            </div>
        </div>
        <div class="row mx-auto my-auto justify-content-center">
            <div id="testimoni-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="slider-testimoni">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($testi as $i => $item)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="px-5 pt-5 pt-lg-10 px-lg-10">
                                        <div class="m-auto testimoni-img">
                                            <img class="img-fluid testimoni-img" src="{{ $item['img'] }}"
                                                alt="default">
                                        </div>
                                        <div class="mt-5 text-center">
                                            <div class="fs-6">{{ $item['testi'] }}</div>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <div class="fs-6 fw-semibold">{{ $item['by'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#testimoni-carousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#testimoni-carousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
