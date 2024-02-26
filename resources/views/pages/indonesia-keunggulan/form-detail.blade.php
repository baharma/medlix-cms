<div class="row mt-5 text-center">
    <h3 class="text-capitalize text-primary">{{ $data->image_title ?? 'Maps Title' }}</h3>
    <div class="col-md-12">
        <img src="{{ $data->image ? asset($data->image) : checkImage($data->image, 200) }}" class="card-img-top"
            alt="...">
    </div>
</div>
