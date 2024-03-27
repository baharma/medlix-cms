<div>

    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <input type="text" class="form-control ps-5 radius-30" wire:model.lazy="searchEvent"
                        placeholder="Search Event">
                    <span class="position-absolute top-50 product-show translate-middle-y"><i
                            class="bx bx-search"></i></span>
                </div>
                <div class="ms-auto"><a href="javascript:;"
                        style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
                        class="btn mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#ModalEventCreate" wire:click="closeEdit"><i
                            class="bx bxs-plus-square" ></i>Add New Event</a></div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event as $index => $item)
                            @if (!$searchEvent || str_contains(strtolower($item->name), strtolower($searchEvent)))
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}
                                        <br>
                                        <span class="text-secondary">{{ $item->details }}</span>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img src="{{ url($item->image) }}" alt="" height="80px">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class="" data-bs-toggle="modal"
                                                data-bs-target="#ModalEventCreate"
                                                wire:click="editEvent('{{ $item->id }}')">
                                                <i class='bx bxs-edit'></i>
                                            </a>
                                            <a href="javascript:;" class="ms-3"
                                                @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })">
                                                <i class='bx bxs-trash'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('layouts.component.confirm-delete')
        @livewire('pages.event.form-event')
    </div>


</div>
