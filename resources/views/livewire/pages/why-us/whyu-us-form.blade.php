<div>
    <div class="modal fade" id="ModalHero" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                        imageDefault="{{ $image }}" name="image" />
                                    @error('image')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-2">
                                    <label for="inpTitle">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title" id="inpTitle"
                                        placeholder="Title">
                                    @error('title')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
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
</script>
@endscript
@endpush
