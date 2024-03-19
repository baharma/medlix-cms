<div>
    <div class="d-flex flex-row-reverse mb-4">
        @if ($dataEdit)
            <a type="button" class="btn btn-primary" href="{{ route('visi-misi.medlinx-form', $dataEdit->id) }}">
                <i class='bx bx-add-to-queue'></i>
                Edit Visi Misi</a>
        @else
            <a type="button" class="btn btn-primary" href="{{ route('visi-misi.medlinx-form') }}">
                <i class='bx bx-add-to-queue'></i>
                Add New Visi Misi</a>
        @endif
    </div>
    @forelse ($dataVisi as $item)
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
                                <img src="{{ $item->visi_img }}" class="img-fluid" alt=""
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
                                <img src="{{ $item->misi_img }}" class="img-fluid" alt=""
                                    style="height:100px;width:100%;object-fit: cover;" />
                            </div>
                        </div>
                    </a>
                    <a href="javascript:;" class="list-group-item list-group-item-action text-center">
                        <h5 class="card-title text-primary">Detail Visi-Misi Images</h5>
                        <img src="{{ $item->detail_img }}" class="img-fluid" alt="" />
                    </a>
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
