<div>
    <div class="d-flex flex-row-reverse mb-4">
        <a type="button" class="btn btn-primary" href="{{route('visi-misi.form')}}">
            <i class='bx bx-add-to-queue'></i>
            Add New Visi Misi</a>
    </div>
    @forelse ($dataVisi as $item )
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
                            <img src="{{$item->visi_img}}" class="img-fluid" alt=""
                                style="height:100px;width:100%;object-fit: cover;" />
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
                            <img src="{{$item->misi_img}}" class="img-fluid" alt=""
                                style="height:100px;width:100%;object-fit: cover;" />
                        </div>
                    </div>
                </a>
                <a href="javascript:;" class="list-group-item list-group-item-action">
                    <h5 class="card-title text-primary">Detail Visi-Misi Images</h5>
                    <img src="{{$item->detail_img}}" class="img-fluid" alt=""
                        style="height:200px;width:100%;object-fit: cover;" />
                </a>
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2">
                    <a type="button" class="btn btn-primary mx-2" href="{{route('visi-misi.form',$item->id)}}">
                        <i class='bx bx-edit'></i>
                        Edit</a>
                    <button type="button" class="btn btn-danger mx-2"
                    @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"
                    >
                        <i class='bx bxs-trash-alt'></i>
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="card">
        <div class="card-header">
            <h5>No data available Please Create</h5>
        </div>
    </div>
    @endforelse
    @include('layouts.component.confirm-delete')
</div>


@script


@endscript
