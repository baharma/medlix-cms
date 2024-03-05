<section id="solution" class="solution">
    @foreach ($solution as $item)
        @if ($item['position'] == 'right')
            @if ($item['default'] == 1)
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Solusi Kami</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 pt-3 content" data-aos="fade-left" data-aos-delay="100">
                            <h3>{{ $item['title'] }}</h3>
                            <br>
                            {!! $item['sub_title'] !!}
                            <div class="text-center text-sm-start d-grid d-md-block">
                                <a href="{{ $item['button']['val'] }}"
                                    class="btn btn-download-profile">{{ $item['button']['name'] }}</a>
                            </div>
                        </div>
                        <div class="col-lg-6 video-box align-self-baseline d-none d-lg-block m-auto"
                            data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ $item['image'] }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            @else
                <section class="solution">
                    <div class="container" data-aos="fade-up">
                        <div class="row d-flex">
                            <div class="col-lg-6 pt-3 content order-2 order-lg-1" data-aos="fade-left"
                                data-aos-delay="100">
                                <div class="row">
                                    @if ($item['icon'])
                                        <div class="col-2 col-lg-12">
                                            <div class="icon">
                                                <img src="{{ $item['icon'] }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-10 col-lg-12 my-auto">
                                        <h3 class="text-start">{{ $item['title'] }}</h3>
                                    </div>
                                </div>
                                {!! $item['sub_title'] !!}

                            </div>
                            <div class="col-lg-6 video-box align-self-baseline order-1 order-lg-2 m-auto">
                                <img src="{{ $item['image'] }}" class="img-fluid" alt="" data-aos="fade-right"
                                    data-aos-delay="100">
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            </>
        @else
            <section class="solution">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-6 video-box align-self-baseline m-auto">
                            <img src="{{ $item['image'] }}" class="img-fluid" alt="" data-aos="fade-left"
                                data-aos-delay="100">
                            @if ($item['miniImg'])
                                <img src="{{ $item['miniImg'] }}" class="img-fluid float-chat" alt=""
                                    data-aos="fade-right" data-aos-delay="100">
                            @endif
                        </div>
                        <div class="col-lg-6 pt-3 content" data-aos="fade-left" data-aos-delay="100">
                            <div class="row">
                                @if ($item['icon'])
                                    <div class="col-2 col-lg-12">
                                        <div class="icon">
                                            <img src="{{ $item['icon'] }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-10 col-lg-12 my-auto">
                                    <h3 class="text-start">{{ $item['title'] }}</h3>
                                </div>
                            </div>
                            {!! $item['sub_title'] !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
