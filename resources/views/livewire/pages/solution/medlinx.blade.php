<div>
    <div>
        <div class="d-flex justify-content-between mb-3">
            <h4></h4>

            <button type="button" class="btn btn-lg addNewModal" wire:click='resetValidatemassge'
                style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
                data-bs-toggle="modal" data-bs-target="#addNewModal"> <i class="bx bx-plus"></i>ADD
                NEW</button>
        </div>

        <div class="accordion" id="accordionExample">

            @foreach ($solution as $i => $item)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $item->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $item->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $item->id }}">
                            {{ $item->title }}
                        </button>
                    </h2>
                    <div id="collapse{{ $item->id }}"
                        class="accordion-collapse collapse @if ($i == 0) show @endif"
                        aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ $item->sub_title }} <br>
                            <hr>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal"
                                wire:click="dataToEdit('{{ $item->id }}')"><i class="bx bx-edit"></i></button>

                            <button class="btn btn-sm btn-danger"
                                @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                    class="bx bx-trash"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal fade" id="addNewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" wire:ignore.self>
                <div class="modal-content" wire:ignore.self>
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> Solution</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent='save' id="formInp">
                        <div class="modal-body row">
                            <div class="col">
                                <div class="form-group row mb-3">
                                    <label for="title" class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                            wire:model="title" placeholder="Solution Title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row  mb-3">
                                    <label for="name" class="col-sm-4 col-form-label">Sub Title</label>
                                    <div class="col-sm-8">
                                        <textarea name="sub_title" wire:model="sub_title" id=""
                                            class="form-control @error('sub_title') is-invalid @enderror" cols="30" rows="5"
                                            placeholder="sub title description..."></textarea>
                                        @error('sub_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" id="close-modal" class="btn btn-warning" data-bs-dismiss="modal">
                                <i class="bx bx-x"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-check"></i>Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" wire:ignore.self>
                <div class="modal-content" wire:ignore.self>
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> Solution Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent='update' id="formInp">
                        <input type="hidden" wire:model="solution_id" id="">
                        <input type="hidden" wire:model="app_id" id="">

                        <div class="modal-body row">
                            <div class="col">
                                <div class="form-group row mb-3">
                                    <label for="title" class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            class="form-control  @error('title') is-invalid @enderror"
                                            wire:model="title" placeholder="Solution Title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row  mb-3">
                                    <label for="name" class="col-sm-4 col-form-label">Sub Title</label>
                                    <div class="col-sm-8">
                                        <textarea name="sub_title" wire:model="sub_title" id=""
                                            class="form-control @error('sub_title') is-invalid @enderror" cols="30" rows="5"
                                            placeholder="sub title description..."></textarea>
                                        @error('sub_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" id="close-modal-update" class="btn btn-warning"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-check"></i>Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.component.confirm-delete')

    </div>

</div>
@push('script')
    @script
        <script>
            $('.addNewModal').on('click', function() {
                document.getElementById("formInp").reset();
            });
            $wire.on('closeModal', () => {
                const closeButton = document.getElementById('close-modal');
                if (closeButton) {
                    closeButton.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            })
            $wire.on('closeModalUpdate', () => {
                const closeButton = document.getElementById('close-modal-update');
                if (closeButton) {
                    closeButton.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            })
        </script>
    @endscript
@endpush
