<div>
    <div class="d-flex justify-content-end mb-3">
        <a type="button" class="btn btn-primary" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            <i class='bx bx-add-to-queue'></i>
            Add News</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
        @foreach ($data as $item)
        <div class="col">
            <div class="card border-primary border-bottom border-3 border-0" style="height:400px ">
                <img src="{{ asset($item->thumbnail) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $item->title }}</h5>
                </div>
                <div class="card-footer">
                    <div style="display: flex; justify-content: space-around">
                        <a href="javascript:;" @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"
                            class="btn btn-danger"><i class='bx bx-trash'></i>Delete</a>
                        <a href="{{ route('artikel.update', ['artikelId' => $item->id]) }}" class="btn btn-warning"><i
                                class='bx bxs-pencil'></i>Edit</a>
                        @if (!$item->check)
                        <a href="{{ route('artikel.detail', $item->id) }}" class="btn btn-info">
                            <i class='bx bxs-detail'></i>
                            Detail</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" wire:ignore.self>
            <div class="modal-content ">
                <form wire:submit.prevent='toForm'>
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Please provide information Website </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Medlinx" value="1" wire:model='app'>
                            <label class="form-check-label" for="Medlinx">Medlinx</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Izidok" value="2" wire:model='app'>
                            <label class="form-check-label" for="Izidok">Izidok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Iziklaim" value="3" wire:model='app'>
                            <label class="form-check-label" for="Iziklaim">Iziklaim</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.component.confirm-delete')
</div>



