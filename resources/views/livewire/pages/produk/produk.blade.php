<div>
    <div class="d-flex flex-row-reverse bd-highlight mb-4">
        <a type="button" class="btn btn-primary" href="{{ route('produck-form') }}">
            <i class='bx bxs-add-to-queue'></i>Add New Produk</a>
    </div>
    <div class="row">
        @foreach ($data as $items)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($items->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{ asset($items->logo) }}" class="card-img-top" alt="..."
                                style="max-width: 200px;">
                        </div>
                        <p class="card-text">{{ $items->text }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="mx-2">
                            <a href="{{ route('produck-form', $items->id) }}" class="btn btn-warning">
                                <i class='bx bxs-edit-alt'></i>
                                Edit</a>
                        </div>
                        <div class="mx-2">
                            <a href="#" class="btn btn-danger"
                                @click="$dispatch('confirm-delete', { get_id: {{ $items->id }} })">
                                <i class='bx bxs-trash-alt'></i>
                                Delete</a>
                        </div>
                        <div class="mx-2">
                            <a href="{{ $items->url }}" class="btn btn-info" target="_blank">
                                <i class='bx bx-link-alt'></i>
                                Link</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @include('layouts.component.confirm-delete')
    </div>

</div>
