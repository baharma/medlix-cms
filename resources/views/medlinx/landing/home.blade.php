 <section id="home" class="slider-area">
     <div id="carouselThree" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            @foreach ($data['hero'] as $index => $item)
                <li data-target="#carouselThree" data-slide-to="{{$index}}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach


         </ol>

         <div class="carousel-inner">
            @foreach ($data['hero'] as $index => $item)
             <div class="carousel-item carousel-slide {{ $index === 0 ? 'active' : '' }}" style="background-image:url('{{ asset($item->image) }}')" >
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-10">
                             <div class="jumbo-content">
                                 <h1 class="title">Berinovasi<br>memberikan solusi<br>teknologi bagi
                                     industri<br>kesehatan Indonesia</h1>
                                 <ul class="slider-btn semi-rounded-buttons">
                                     <li><a class="main-btn rounded-one page-scroll" href="#product">SELENGKAPNYA</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div> <!-- row -->
                 </div> <!-- container -->
             </div> <!-- carousel-item -->
             @endforeach
         </div>
     </div>
 </section>
