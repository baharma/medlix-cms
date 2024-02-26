<div class="row mt-4 mb-5 p-2 text-center">
    <h4>{{ $data->title ?? '-' }}</h4>
    <h6>{{ $data->description ?? '-' }}</h6>

</div>

<div class="row mt-4 mb-2 p-2">
    @if ($data && isset($data->KeunggulanList))
        @foreach ($data->KeunggulanList as $items)
            <div class="col row">
                <div style="width: 18rem;" class="text-center">
                    <img src="{{ $items->image ? asset($items->image) : checkImage('image.jpg', 200) }}"
                        class="card-img-top text-center" alt="{{ $items->title }}" style="width: 50px">
                    <div class="card-body">
                        <p class="card-text">{{ $items->title }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h4>None</h4>
    @endif
</div>
