<div>
    <div class="d-flex justify-content-between mb-3">
        <h4></h4>
        <button type="button" class="btn"
            style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
            data-bs-toggle="modal" data-bs-target="#ModalHero" wire:click='clear'> <i class="bx bx-plus"></i> Add/Change
            Hero Content
        </button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    @foreach ($model as $item)
                        <tr>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="{{ $item->image }}" style="width: 100px">
                            </td>
                            <td>
                                <p>{{ $item->title }}</p>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-primary">Action to:
                                    {{ decode($item->extend)['btn_action'] }}</span>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-warning btn-sm mr-2 mt-2"
                                        wire:click="editEvent('{{ $item->id }}')" data-bs-toggle="modal"
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

    <div>
        <div class="modal fade" id="ModalHero" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg " wire:ignore.self>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Hero Area</h5>
                        <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12" x-data={image:false,dropify:true,cancel:true}
                                    x-init="$wire.on('imageshow', (value) => {
                                        image = value;
                                        dropify = false;
                                        cancel = true;
                                    })
                                    $wire.on('clearCancel', () => {
                                        image = false;
                                        dropify = true;
                                        cancel = false;
                                    })">
                                    <div class="form-group mb-3" x-show="image">
                                        <img src="{{ asset($image) }}" alt="" style="max-width: 700px"><br>
                                        <a href="#" x-on:click="image = ! image, dropify = ! dropify">Edit
                                            Image</a>
                                    </div>
                                    <div class="form-group mb-3" x-show="dropify">
                                        <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                            imageDefault="{{ $image }}" name="image" />
                                        <a href="#" x-on:click="image = ! image, dropify = ! dropify "
                                            x-show='cancel'>Cancel</a>
                                    </div>

                                </div>

                                <div class="col-md-12" id="inpList">
                                    <div class="form-group mb-2">
                                        <label for="inpTitle">Hero Title</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control" wire:model="title"
                                            id="inpTitle"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="inpTitle">Button Action</label>
                                        <input type="text" class="form-control" wire:model="action" id="inpTitle"
                                            placeholder="#product">
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
    </div>


    @push('scripts')
        @script
            <script>
                $('.closeBtn').on('click', function() {
                    location.reload()
                })
                $wire.on('modalClosed', () => {

                    const form = document.getElementById('formInp');
                    const closeButton = document.getElementById('close-modal');
                    if (closeButton) {
                        form.reset();
                        closeButton.click();
                    } else {
                        console.error('Button with ID "close-modal" not found');
                    }
                });
                $wire.on('sentToImage', (Image) => {
                    const image = document.getElementById('image');
                    const imageUrl = `${window.location.origin}/${Image}`;
                    image.setAttribute('data-default-file', imageUrl);


                });
            </script>
        @endscript
    @endpush

</div>
