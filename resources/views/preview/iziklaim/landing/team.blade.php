<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>TIM IZIKLAIM</h2>
        </div>
        <div class="row">
            @foreach ($team['up'] as $item)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch justify-content-center" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="member rounded-4">
                        <div class="member-img">
                            <img src="{{ $item['image'] }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>{{ $item['name'] }}</h4>
                            <span>{{ $item['title'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            @foreach ($team['down'] as $i)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch justify-content-center" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="member rounded-4">
                        <div class="member-img">
                            <img src="{{ $i['image'] }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>{{ $i['name'] }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
