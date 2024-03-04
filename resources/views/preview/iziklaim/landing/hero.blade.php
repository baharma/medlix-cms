<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center mb-5">

                <h1>{!! $hero['title'] !!}</h1>
            </div>
            <div class="col-lg-8 text-center">
                <img src="{{ $hero['image'] }}" class="img-fluid" alt="" data-aos-delay="100">
                <img src="{{ $hero['image_mini'] }}" class="img-fluid float1" alt="" data-aos="fade-right"
                    data-aos-delay="100">
            </div>
        </div>
    </div>
</section>
