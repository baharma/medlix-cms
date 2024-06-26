<div>
    <div class="modal fade" id="ModalEventCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="p-4 rounded">
                            <div wire:loading>
                                <div class="spinner-grow" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div wire:loading.remove>
                                <div x-data="{ image: false, dropify: true, cancel: false }" x-init="$wire.on('ImageShow', () => {
                                    image = true
                                    dropify = false
                                })
                                $wire.on('clearCancel', () => {
                                    cancel = false
                                    image = false
                                    dropify = true
                                })">
                                    <div class="row mb-3" x-show="image">
                                        <label for="inputAddress4" class="col col-form-label">Image Event</label>
                                        <img src="{{ $image }}" style="width: 350px">
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <a href="#"
                                                x-on:click="image = ! image,dropify = ! dropify,cancel = ! cancel">Edit
                                                Image</a>
                                        </div>

                                    </div>
                                    <div class="row mb-3" x-show="dropify">
                                        <x-componen-form.input-image-dropify label='Image Event' wireModel="image"
                                            imageDefault="" name="image" />
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <a href="#"
                                                x-on:click="image = ! image,dropify = ! dropify,cancel = ! cancel"
                                                x-show="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <x-componen-form.input-form idInput="nameEvent" label="Name Event" wireModel="name"
                                        placeholder="Enter Your Name Event" name="name" classInput="col-sm-9"
                                        classLabels="col-sm-3" />
                                </div>
                                <div class="row mb-3">
                                    <x-componen-form.textarea-input label="Description details Event"
                                        idTextarea="DescriptionEvent" wireModel="detail" rows="3"
                                        classInput="col-sm-9" classLabels="col-sm-3" placeholder="Description Event" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning closeBtn"
                            data-bs-dismiss="modal"><i class="bx bx-x"></i> Close</button>
                        <button type="submit" class="btn btn-primary" wire:click="handleButtonClick"><i
                                class="bx bx-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@push('scripts')
    @script
        <script>
            $wire.on('modalClosed', () => {
                const closeButton = document.getElementById('close-modal');
                if (closeButton) {
                    closeButton.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            });
            $wire.on('sentToImage', (event) => {
                const image = document.getElementById('image');
                image.setAttribute('data-default-file', '');
                const imageUrl = `${window.location.origin}${event}`;
                image.setAttribute('data-default-file', imageUrl);

            });
            $('.closeBtn').on('click', function() {
                location.reload()
            })
        </script>
    @endscript
@endpush
