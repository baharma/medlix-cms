<section id="testimoni" class="testimonial-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-6">
                <div class="testimonial-left-content mt-45">
                    <h4 class="title">TESTIMONI</h4>
                    <ul class="testimonial-line">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <p class="text-testimoni">Apa yang klien katakan tentang Kami.</p>
                </div> <!-- testimonial left content -->
            </div>
            <div class="col-lg-6">
                <div class="testimonial-right-content mt-50">
                    <div class="quota">
                        <i class="lni lni-quotation"></i>
                    </div>
                    <div class="testimonial-content-wrapper testimonial-active">
                        @foreach ($data['testimoni'] as $item)
                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="text">{{$item->testi}}</p>
                            </div>
                            <div class="testimonial-author d-sm-flex justify-content-between">
                                <div class="author-info d-flex align-items-center">
                                    <div class="author-image">
                                        <img src="{{ $item->testi_by_img }}"
                                            alt="author">
                                    </div>
                                    <div class="author-name media-body">
                                        <h5 class="name">{{$item->testi_by}}</h5>
                                        <span class="sub-title">{{$item->testi_by_title}}</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- single testimonial -->
                        @endforeach

                    </div> <!-- testimonial content wrapper -->
                </div> <!-- testimonial right content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
