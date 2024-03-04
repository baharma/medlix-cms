<section id="clients" class="clients">
    <div class="container" data-aos="fade-up">
        <div class="section-title p-0">
            <h2>Klien</h2>
        </div>
    </div>
</section>
<section class="clients clients-bg py-0">
    <div class="container">
        <div class="marquee">
            <div class="marquee-content">
                <div class="marquee-item">
                    <img src="{{ asset('img/clients/car.png') }}" alt="">
                </div>
                @foreach ($provider['slider']['client'] as $pro)
                    <div class="marquee-item">
                        <img src="{{ $pro['images'] }}" alt="">
                    </div>
                @endforeach
                @foreach ($provider['slider']['client'] as $pro)
                    <div class="marquee-item">
                        <img src="{{ $pro['images'] }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
