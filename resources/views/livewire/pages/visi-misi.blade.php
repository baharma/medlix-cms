<div>
    <div class="d-flex flex-row-reverse mb-4">
        <a type="button" class="btn btn-primary" href="{{route('visi-misi.form')}}">
            <i class='bx bx-add-to-queue'></i>
            Add New Visi Misi</a>
    </div>
    @foreach ($dataVisi as $item)
    <div class="card">
        <div class="card-body">
            <div class="list-group">
                <a href="javascript:;" class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <h5 class="card-title text-white">Visi</h5>
                            <p class="card-text">{!! $item->visi !!}</p>
                        </div>
                        <div>
                            <img src="{{$item->visi_img}}"
                                class="img-fluid" alt="" style="height:100px;width:100%;object-fit: cover;" />
                        </div>
                    </div>
                </a>
                <a href="javascript:;" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <h5 class="card-title text-primary">Misi</h5>
                            <p class="card-text">{!! $item->misi !!}</p>
                        </div>
                        <div>
                            <img src="{{$item->misi_img}}"
                                class="img-fluid" alt="" style="height:100px;width:100%;object-fit: cover;" />
                        </div>
                    </div>
                </a>
                <a href="javascript:;" class="list-group-item list-group-item-action">
                    <h5 class="card-title text-primary">Detail Visi-Misi Images</h5>
                    <img src="{{$item->detail_img}}"
                        class="img-fluid" alt="" style="height:200px;width:100%;object-fit: cover;" />
                </a>
            </div>
        </div>
    </div>
    @endforeach



</div>


@script


@endscript
