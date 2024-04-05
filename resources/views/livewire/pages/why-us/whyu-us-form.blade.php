<div>
    <div class="modal fade" id="ModalHero" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" wire:ignore.self
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form</h5>
                    <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" x-data="{ image: false, dropify: true, cancel: false }" x-init="$wire.on('imageshow', (event) => {
                                image = true;
                                dropify = false;
                            })
                            $wire.on('clearAll', () => {
                                cancel = false
                                image = false;
                                dropify = true;
                            })">
                                <div class="form-group mb-3" style="text-align: center" x-show='image'>
                                    <img src="{{ asset($image) }}" alt="" style="width: 300px;"><br>
                                    <a href="#"
                                        x-on:click="image = ! image, dropify = ! dropify,cancel = ! cancel ">Edit
                                        Image</a>
                                </div>
                                <div class="form-group mb-3" x-show='dropify'>
                                    <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                        imageDefault="{{ $image }}" name="image" />
                                    @error('image')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                    <a href="#"
                                        x-on:click="image = ! image, dropify = ! dropify,cancel = ! cancel"
                                        x-show="cancel">Cancel</a>
                                </div>
                            </div>

                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-2">
                                    <label for="inpTitle">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        wire:model="title" id="inpTitle" placeholder="Title">
                                    @error('title')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning  closeBtn"
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




@push('script')
    @script
        <script>
            $wire.on('clearDrof', () => {
                $('.dropify').attr('data-default-file', '')
                $('.dropify').dropify();
                var clear = $('.dropify-clear');
                clear.click();
            })
            $wire.on('closeModal', () => {
                const closemodal = document.getElementById('close-modal');
                if (closemodal) {
                    closemodal.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            })

            $wire.on('showImage', (event) => {



                let data = document.getElementById('image');


                setTimeout(() => {
                    $('.dropify').dropify();
                    data.setAttribute('data-default-file', '');
                    const imageUrl = `${window.location.origin}${event[0]}`;
                    setTimeout(() => {
                        data.setAttribute('data-default-file', imageUrl);
                    }, 200)
                }, 500);
            });
            $('.closeBtn').on('click', function() {
                location.reload()
            })
        </script>
    @endscript
@endpush
