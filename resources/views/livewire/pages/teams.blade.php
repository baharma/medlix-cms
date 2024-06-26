@push('style')
@endpush
<div>
    <div class="d-flex justify-content-between mb-3">
        <h4></h4>
        <button type="button" class="btn addBtn"
            style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
            wire:click='clearValidate' data-bs-toggle="modal" data-bs-target="#ModalHero"> <i class="bx bx-plus"></i> Teams
        </button>
    </div>
    <div class="row mb-3">
        @foreach ($model as $item)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $item->name }}</h6>
                        <p class="card-text">{{ $item->title }}</p>

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('team.edit', $item->id) }}" wire:navigate class="btn btn-warning"> <i
                                class="bx bx-edit"></i></a>
                        <button class="btn btn-danger"
                            @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                class="bx bx-trash"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-4">
        @foreach ($team as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="..."
                            style="max-width: 200px">
                    </div>
                    <div class="card-footer bg-white text-center">
                        <h6 class="card-title">{{ $item->name }}</h6>
                        <p class="card-text">{{ $item->title }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('team.edit', $item->id) }}" wire:navigate class="btn btn-warning"> <i
                                class="bx bx-edit"></i></a>
                        <button class="btn btn-danger"
                            @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                class="bx bx-trash"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('layouts.component.confirm-delete')

    <div class="modal fade" id="ModalHero" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Teams</h5>
                    <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                        imageDefault="{{ $image }}" name="image" />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-2">
                                    <x-componen-form.input-form label='Name' wireModel="name" name="name"
                                        placeholder="Fauzi Sungkar" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <x-componen-form.input-form label='Title' wireModel="title" name="title"
                                        placeholder="Director" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning closeBtn"
                            data-bs-dismiss="modal"><i class="bx bx-x"></i> Close</button>
                        <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
                            <i class="bx bx-save"></i>
                            <span wire:loading.remove>Save</span>
                            <span wire:loading>Loading...</span>
                        </button>
                        <!-- Loading Indicator -->
                        <span wire:loading>Loading...</span>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @push('script')
        @script
            <script>
                $('.addBtn').on('click', function() {
                    var clear = $('.dropify-clear');
                    clear.click();
                    $('.image').attr('data-default-file', '')
                    $('.image').dropify();

                })
                $wire.on('closeModal', () => {
                    const closeButton = document.getElementById('close-modal');
                    if (closeButton) {
                        closeButton.click();
                    } else {
                        console.error('Button with ID "close-modal" not found');
                    }
                })
                $('.closeBtn').on('click', function() {
                    location.reload()
                })
            </script>
        @endscript
    @endpush
</div>
