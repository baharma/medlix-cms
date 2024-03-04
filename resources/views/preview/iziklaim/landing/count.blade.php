<section id="counts" class="counts counts-bg">
    <div class="container">
        <div class="row justify-content-end">
            @foreach ($provider['text'] as $item)
                <div class="col-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <p>Lebih dari</p>
                        {{-- <span data-purecounter-start="0" data-purecounter-end="2000000" data-purecounter-duration="2" class="purecounter"></span> --}}
                        <span>{{ $item['value'] }}</span>
                        <p>{{ $item['title'] }}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
