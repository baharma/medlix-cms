<section id="about" class="about-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-10">
                    <h3 class="title">TENTANG KAMI</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="team-image">
                        <img src="{{ asset('medlinx/landing/images/management/' . env('DIREKTUR_IMAGE')) }}"
                            alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a target="blank" href="{{ env('DIREKTUR_TWITTER') }}"><i
                                            class="lni lni-twitter-original"></i></a></li>
                                <li><a target="blank" href="{{ env('DIREKTUR_LINKEDIN') }}"><i
                                            class="lni lni-linkedin-original"></i></a></li>
                                <li><a target="blank" href="{{ env('DIREKTUR_IG') }}"><i
                                            class="lni lni-instagram"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="javascript:;">{{ env('DIREKTUR_NAME') }}</a></h4>
                        <span class="sub-title">Direktur</span>
                    </div>
                </div> <!-- single team -->
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="team-image">
                        <img src="{{ asset('medlinx/landing/images/management/' . env('COO_IMAGE')) }}" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a target="blank" href="{{ env('COO_TWITTER') }}"><i
                                            class="lni lni-twitter-original"></i></a></li>
                                <li><a target="blank" href="{{ env('COO_LINKEDIN') }}"><i
                                            class="lni lni-linkedin-original"></i></a></li>
                                <li><a target="blank" href="{{ env('COO_IG') }}"><i class="lni lni-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="javascript:;">{{ env('COO_NAME') }}</a></h4>
                        <span class="sub-title">COO</span>
                    </div>
                </div> <!-- single team -->
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="team-image">
                        <img src="{{ asset('medlinx/landing/images/management/' . env('GM_IMAGE')) }}" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a target="blank" href="{{ env('GM_FB') }}"><i
                                            class="lni lni-facebook-original"></i></a></li>
                                <li><a target="blank" href="{{ env('GM_LINKEDIN') }}"><i
                                            class="lni lni-linkedin-original"></i></a></li>
                                <li><a target="blank" href="{{ env('GM_IG') }}"><i class="lni lni-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="javascript:;">{{ env('GM_NAME') }}</a></h4>
                        <span class="sub-title">GM Business dan Partnership</span>
                    </div>
                </div> <!-- single team -->
            </div>
        </div>
        <div class="row mt-50">
            <div class="col-lg-6 visi-misi">
                <img src="{{ asset('medlinx/landing/images/visi.jpg') }}">
                <p class="vimis-title">VISI</p>
                <p class="vimis-desc">Dikenal sebagai penyedia solusi kesehatan terkemuka di Indonesia.</p>
            </div>
            <div class="col-lg-6 visi-misi">
                <img src="{{ asset('medlinx/landing/images/misi.jpg') }}">
                <p class="vimis-title">MISI</p>
                <p class="vimis-desc">Membantu dan memfasilitasi industri pelayanan kesehatan di Indonesia untuk
                    beroperasi dan bertumbuh dengan menyediakan solusi berupa sistem kesehatan yang terdigitalisasi dan
                    terdepan.</p>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="container">
        <div class="row mt-50">
            <div class="col-lg-12">
                <img src="{{ asset('medlinx/landing/images/timeline.png') }}">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
