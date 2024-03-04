<section id="providers" class="providers section-bg">
    <div class="container-fluid">
        <div class="marquee">
            <div class="marquee-content">
                @foreach ($provider['slider']['provider'] as $pro)
                    <div class="marquee-item">
                        <img src="{{ $pro['images'] }}" alt="">
                    </div>
                @endforeach
                @foreach ($provider['slider']['provider'] as $pro)
                    <div class="marquee-item">
                        <img src="{{ $pro['images'] }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
