<div class="py-20" id="event">
    <div class="container-fluid">
        <div class="mt-17">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h3 class="text-primary">Event</h3>
                </div>
            </div>
        </div>
        <div class="row mx-auto my-auto justify-content-center">
            <div id="event-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="slider-event">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($event as $i => $item)
                            <div class="carousel-item @if ($i == 0) active @endif">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="card-xl-stretch mx-3">
                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                            href="{{ $item['image'] }}">
                                            <div
                                                class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded">
                                                <img class="img-fluid rounded-top" src="{{ $item['image'] }}"
                                                    alt="">
                                            </div>
                                        </a>
                                        <div class="py-5 px-4 text-center rounded-bottom">
                                            <p class="text-gray-800 fw-bold">{{ $item['name'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#event-carousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#event-carousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
