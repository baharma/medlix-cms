<section id="rewards" class="rewards-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-25">
                    <h3 class="title">PENGHARGAAN</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            @foreach ($data['penghargaan'] as $item)
            <div class="col-lg-3 col-md-6 col-sm-9">
                <div class="rewards-style mt-30">
                    <div class="rewards-icon text-center pt-25">
                        <img src="{{ asset($item['images']) }}" alt="">
                    </div>
                    <div class="rewards-header text-center">
                        <img class="sub-title" src="{{ asset($item['images']) }}"
                            alt="">
                    </div>
                    <div class="rewards-detail text-center">
                        {!! insertLineBreaks($item['text']) !!}
                    </div>
                </div> <!-- pricing style one -->
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</section>
