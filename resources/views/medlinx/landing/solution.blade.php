<section id="solution" class="solution-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-25">
                    <h3 class="title">SOLUSI</h3>
                </div> <!-- section title -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="faq-content mt-45">
                    <div class="solution-accordion">
                        <div class="accordion" id="accordionExample">
                            @foreach ($data['solution'] as $index => $item)
                            <div class="card">
                                <div class="card-header" id="heading-{{$index}}">
                                    <a href="#" @if ($index !=0) class="collapsed" @endif data-toggle="collapse"
                                        data-target="#collapse-{{$index}}" aria-expanded="@if ($index == 0)
                                            true
                                        @else
                                            false
                                        @endif" aria-controls="collapse-{{$index}}">{{$item->title}}</a>
                                </div>
                                <div id="collapse-{{$index}}" class="collapse  @if ($index == 0) show @endif"
                                    aria-labelledby="heading-{{$index}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="text">{{$item->sub_title}}</p>
                                        <div class="solution-btn semi-rounded-buttons">
                                            <a class="main-btn rounded-one page-scroll btn-solution"
                                                data-name="Chatbot untuk Korporasi">Hubungi Kami</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- card -->
                            @endforeach
                        </div>
                    </div> <!-- faq accordion -->
                </div> <!-- faq content -->
            </div>
            <div class="col-lg-5">
                <div class="solution-image mt-45">
                    <img src="{{ asset('medlinx/landing/images/solution.png') }}" alt="solution">
                </div> <!-- faq image -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section class="why-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section-title text-center pb-25">
                    <h3 class="title-why">MENGAPA HARUS MEDLINX?</h3>
                </div> <!-- section title -->
            </div>
        </div>
        <div class="row justify-content-center mt-70">
            @foreach ($data['why'] as $item)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="icon-why">
                    <img class="img-why" src="{{ $item->images }}" alt="">
                </div>
                <div class="why-style">
                    <div class="why-detail text-center mt-20">
                        {{ $item->text }}
                    </div>
                </div>
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</section>
