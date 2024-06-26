<div>
    <div class="modal fade" id="modalPenghargaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Award</h5>
                    <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row" x-data="{ showdrofy: true, image: false, showdrofyLogo: true, imagelogo: false, cancel: true }" x-init="$wire.on('showImage', value => {
                            image = value;
                            imagelogo = value;
                            showdrofyLogo = false;
                            showdrofy = false
                            cancel = true
                        });
                        $wire.on('clearimage', () => {
                            image = false;
                            imagelogo = false;
                            showdrofyLogo = true;
                            showdrofy = true;
                            cancel = false
                        });">
                            <div class="col-md-6" id="inpList">
                                <div class="form-group mb-3" x-show='image'>
                                    <label for="">Icon</label>
                                    <img src="{{ $icon }}" alt="" style="width: 210px;height: 200px;">
                                    <a href="#" x-on:click="image = ! image , showdrofy = ! showdrofy">Edit
                                        Image</a>
                                </div>
                                <div class="form-group mb-3" x-show='showdrofy'>
                                    <x-componen-form.input-image-dropify label='Icon' wireModel="icon" name="icon"
                                        imageDefault="{{ $icon }}" />
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <a href="#" x-on:click="image = ! image , showdrofy = ! showdrofy"
                                        x-show='cancel'>cancel</a>
                                </div>
                            </div>

                            <div class="col-md-6" id="inpList">
                                <div class="form-group mb-3" x-show='imagelogo'>
                                    <label for="">Logo</label>
                                    <img src="{{ $logo }}" alt="" style="width: 210px;height: 200px;">
                                    <a href="#"
                                        x-on:click="imagelogo = ! imagelogo , showdrofyLogo = ! showdrofyLogo">Edit
                                        Image</a>
                                </div>
                                <div class="form-group mb-3" x-show='showdrofyLogo'>
                                    <x-componen-form.input-image-dropify label='Logo' wireModel="logo" name="logo"
                                        imageDefault="{{ $logo }}" />
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <a href="#"
                                        x-on:click="imagelogo = ! imagelogo , showdrofyLogo = ! showdrofyLogo"
                                        x-show='cancel'>cancel</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <x-componen-form.textarea-input label='Text' wireModel="text" name="text" />
                                @error('text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal-penghargaan" class="btn btn-warning closeBtn"
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
            $wire.on('closeModal', () => {
                const closeButton = document.getElementById('close-modal-penghargaan');
                if (closeButton) {
                    closeButton.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
                const removeImage = $('.dropify-clear');
                removeImage.click();
            })
        </script>
    @endscript
@endpush
