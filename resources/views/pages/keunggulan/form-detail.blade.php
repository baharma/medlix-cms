<div class="row mt-4 mb-2 p-2">
    <div class="col">
        <label for="">Title Keunggulan</label>
        <h6 class="text-capitalize fw-bold">{{$data->title ?? 'data is missing'}}</h6>
    </div>
    <div class="col">
        <label for="">Description Keunggulan</label>
        <p>{{$data->description ?? 'data is missing'}}</p>
    </div>
</div>

<div class="row mt-4 mb-2 p-2">
    <h4 class="text-capitalize fw-bold">
        List Keunggulan
    </h4>
    @if($data && isset($data->KeunggulanList))
        @foreach ($data->KeunggulanList as $items)
            <div class="col-lg-3 row">
                <div  style="width: 18rem;">
                    <img src="{{$items->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">{{$items->title}}</p>
                    </div>
                  </div>
            </div>
        @endforeach
    @else
        <h4>None</h4>
    @endif
</div>
