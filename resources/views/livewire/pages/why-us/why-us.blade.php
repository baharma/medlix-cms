<div>
    <div class="d-flex justify-content-between mb-3">
        <h4></h4>
        <button type="button" class="btn" wire:click='clearWhy'
            style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
            data-bs-toggle="modal" data-bs-target="#ModalHero"> <i class="bx bx-plus"></i> Add/Change About Why Medlinx
            Content
        </button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    @foreach ($model as $item)
                        <tr>
                            <td>
                                <img src="{{ $item->images }}" alt="{{ $item->images }}" style="width: 100px">
                            </td>
                            <td>
                                <p>{{ $item->text }}</p>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-warning btn-sm mr-2 mt-2"
                                        wire:click="Edit('{{ $item->id }}')" data-bs-toggle="modal"
                                        data-bs-target="#ModalHero"><i class="bx bx-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm mt-2"
                                        @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                            class="bx bx-trash"></i></button>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    @include('layouts.component.confirm-delete')
    @livewire('pages.why-us.whyu-us-form')

</div>
