<section id="partner" class="partner-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-30">
                    <h3 class="title">MITRA KAMI</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <!-- <div class="row"> -->
        <div id="carouselPartner" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ( $diliputChunk as $index=>$items )
                    <li data-target="#carouselPartner" data-slide-to="{{$index}}" class="@if ($index == 0) active @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($diliputChunk as $index => $chunk)
                <div class="carousel-item @if ($index == 0) active @endif">
                    <div class="container">
                        <div class="row">
                            @foreach ($chunk as $item)
                            <div class="col-lg-3 col-md-3 col-sm-3 part-sm">
                                <div class="slider-partner-content">
                                    <img src="{{ asset($item->images) }}">
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-30">
                    <h3 class="title">DILIPUT OLEH</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div id="carouselMedia" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($mitraChunk as $index=>$item)
                    <li data-target="#carouselMedia" data-slide-to="{{$index}}" class="@if ($index == 0) active @endif"></li>
                @endforeach

            </ol>
            <div class="carousel-inner">
                @foreach ($mitraChunk as  $index=>$chunk)
                <div class="carousel-item @if ($index == 0) active @endif">
                    <div class="container">
                        <div class="row">
                            @foreach ($chunk as $item)
                            <div class="col-lg-3 col-md-3 col-sm-3 part-sm">
                                <div class="slider-media-content">
                                    <img src="{{ asset($item->images) }}">
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
