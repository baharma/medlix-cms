<section id="product" class="product-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-25">
                    <h3 class="title">PRODUK</h3>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            @foreach ($data['produk'] as $item)
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="product-style mt-30">
                    <div class="product-icon text-center">
                        <img src="{{$item->image}}" alt="">
                    </div>
                    <div class="product-header text-center">
                        <img class="sub-title" src="{{ $item->logo }}"
                            alt="">
                    </div>
                    <div class="product-detail">
                        {{$item->text}}
                    </div>
                    <div class="product-btn semi-rounded-buttons text-center">
                        <a class="main-btn rounded-one" target="blank" href="{{$item->url}}">Selengkapnya, klik di
                            sini!</a>
                    </div>
                </div> <!-- pricing style one -->
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</section>
