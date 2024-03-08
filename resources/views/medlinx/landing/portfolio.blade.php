<section id="portfolio" class="slider-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-30">
                    <h3 class="title">PORTOFOLIO</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <!-- <div class="row"> -->

        <div id="carouselPortfolio" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($dataChunks as $index => $item)
                <li data-target="#carouselPortfolio" data-slide-to="{{$index}}" class="@if ($index == 0) active @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($dataChunks as $index => $chunk)
                <div class="carousel-item @if ($index == 0) active @endif">
                    <div class="container">
                        <div class="row">
                            @foreach ($chunk as $item)
                            <div class="col-lg-3 col-md-3 col-sm-3 port-sm">
                                <div class="slider-portfolio-content">
                                    <img src="{{ asset($item['images']) }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- </div> -->
    </div>
</section>

<section id="portfolio2" class="slider-area2">
    <div id="carouselPortfolio2" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($porto2Chunks as $index => $item)
            <li data-target="#carouselPortfolio2" data-slide-to="0" class="@if ($index == 0) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($porto2Chunks as $index => $chunk)
            <div class="carousel-item @if ($index == 0) active @endif">
                <div class="container">
                    <div class="row">
                        @foreach ($chunk as $item)
                        <div class="col-lg-3 col-md-3 col-sm-3 port-sm">
                            <div class="slider-portfolio-content">
                                <img src="{{ asset($item['images']) }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
