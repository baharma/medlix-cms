<div class="row mt-4 mb-2 p-2">
    <div class="col">
        <label for="">Title</label>
        <h6 class="text-capitalize fw-bold">{{$data->image_title ?? 'data is missing'}}</h6>
    </div>
</div>
<div class="row mt-4 mb-2 p-2">
    <label for="">Image Keunggulan</label>
    <div class="col">
        <img src="{{$data->image ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSs5Xs8ukkBwO2KxnpayyUoQCE6JZTDIfV93FuzVqAqQQ&s'}}" style="width: 500px;" class="card-img-top" alt="...">
    </div>
</div>
