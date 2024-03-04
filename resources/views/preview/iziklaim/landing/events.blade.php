<section id="events" class="events section-bg">
    <div class="container-fluid px-5" data-aos="fade-up">
        <div class="section-title">
            <h2>Acara</h2>
        </div>
        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($event as $ev)
                    <div class="swiper-slide">
                        <div class="events-item">
                            <div class="member">
                                <div class="events-img">
                                    <img src="{{ $ev['image'] }}" class="img-fluid rounded" alt="">
                                </div>
                                <div class="member-info pt-3">
                                    <span>{{ $ev['name'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev d-none d-md-block"></div>
            <div class="swiper-button-next d-none d-md-block"></div>
        </div>
    </div>
</section>
