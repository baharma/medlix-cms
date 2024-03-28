<section id="counts" class="counts counts-bg">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($provider['text'] as $item)
                <div class="col d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <p>Lebih dari</p>
                        <span>{{ $item['value'] }}</span>
                        <p>{{ $item['title'] }}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
