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
            @foreach ($data['team'] as $item)
                <div class="col-lg-4 col-sm-12">
                    <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s"
                        data-wow-delay="0s">
                        <div class="team-image">
                            <img src="{{ asset($item['image']) }}" alt="Team">
                        </div>
                        <div class="team-content">
                            <div class="team-social">
                                <ul class="social">
                                    <li><a target="_blank" href="{{ $item['twitter'] }}"><i
                                                class="lni lni-twitter-original"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ $item['linkedin'] }}"><i
                                                class="lni lni-linkedin-original"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ $item['instagram'] }}"><i
                                                class="lni lni-instagram"></i></a></li>
                                </ul>
                            </div>
                            <h4 class="team-name"><a href="javascript:;">{{ $item['name'] }}</a></h4>
                            <span class="sub-title">{{ $item['title'] }}</span>
                        </div>
                    </div> <!-- single team -->
                </div>
            @endforeach

        </div>
        <div class="row mt-50">
            <div class="col-lg-6 visi-misi">
                <img src="{{ $data['visimisi']['visi_img'] }}">
                <p class="vimis-title">VISI</p>
                <p class="vimis-desc">{{ strip_tags($data['visimisi']['visi']) }}</p>
            </div>
            <div class="col-lg-6 visi-misi">
                <img src="{{ $data['visimisi']['misi_img'] }}">
                <p class="vimis-title">MISI</p>
                <p class="vimis-desc">{{ strip_tags($data['visimisi']['misi']) }}</p>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="container">
        <div class="row mt-50">
            <div class="col-lg-12">
                <img src="{{ $data['visimisi']['detail_img'] }}">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
