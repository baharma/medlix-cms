<div>
    <div class="card">
        <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="inpList">
                        <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Image' wireModel="image" name="image"
                                imageDefault="{{ asset($image) }}" />
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('slider') }}" type="button" id="close-modal" class="btn btn-warning" wire:navigate><i
                        class="bx bx-arrow-back"></i>
                    Back</a>
                <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Update</button>
            </div>

        </form>
    </div>
</div>
