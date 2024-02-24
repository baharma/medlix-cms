<div>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('izidok-testimoni.form') }}" class="btn btn-primary">
            <i class='bx bx-add-to-queue'></i>
            Add Testimoni</a>
    </div>
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">

        @forelse ($data as $item)
            <div class="col">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $item->testi_by_img }}" alt="..." class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->testi_by }}</h5>
                                <p class="card-text">{{ $item->testi_by_title }}</p>
                                <p class="card-text">{{ $item->testi }}</p>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('testimoni-medlinx.form', $item->id) }}"
                                        class="btn btn-warning mx-2">
                                        <i class='bx bxs-edit'></i>
                                        Edit</a>
                                    <a href="javascript:;" class="btn btn-danger mx-2"
                                        @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })">
                                        <i class='bx bxs-trash-alt'></i>
                                        Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card p-3">
                <h4>
                    No Available Data, Please Add Testimoni.
                </h4>
            </div>
        @endforelse
        @include('layouts.component.confirm-delete')
    </div>
</div>
