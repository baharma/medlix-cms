<div>
    <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" wire:ignore.self
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-3">
                                    <x-componen-form.input-image-dropify label='Image' wireModel="image" name="image"
                                        imageDefault="{{ $image }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model="type" value="porto1" type="radio"
                                            id="porto1" name="type">
                                        <label class="form-check-label" for="porto1">
                                            Portofolio Slider 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model="type" value="porto2" type="radio"
                                            id="porto2" name="type" checked>
                                        <label class="form-check-label" for="porto2">
                                            Portofolio Slider 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model="type" value="mitra" type="radio"
                                            id="mitra" name="type">
                                        <label class="form-check-label" for="mitra">
                                            Mitra
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model="type" value="diliput" type="radio"
                                            id="diliput" name="type">
                                        <label class="form-check-label" for="diliput">
                                            Diliput
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning" data-bs-dismiss="modal"><i
                                class="bx bx-x"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Submit</button>
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
                const closeButton = document.getElementById('close-modal');
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
